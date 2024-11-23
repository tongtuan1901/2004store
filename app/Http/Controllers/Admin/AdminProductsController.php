<?php

namespace App\Http\Controllers\admin;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\ProductVariation;
use App\Models\Size;

class AdminProductsController extends Controller
{
    public function index(Request $request)
{
    // Lấy dữ liệu cần thiết
    $brands = Brand::all();
    $categories = Category::all();

    // Truy vấn cơ bản
    $query = AdminProducts::with(['category', 'images', 'variations.size', 'variations.color'])
        ->withTrashed()
        ->select('products.*');

    // Tìm kiếm theo từ khóa (tên sản phẩm, mô tả, danh mục, thương hiệu)
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%')
              ->orWhereHas('category', function ($catQuery) use ($search) {
                  $catQuery->where('name', 'like', '%' . $search . '%');
              })
              ->orWhereHas('brand', function ($brandQuery) use ($search) {
                  $brandQuery->where('name', 'like', '%' . $search . '%');
              })
              ->orWhere('price_sale', 'like', '%' . $search . '%');
        });
    }

    // Tìm kiếm theo trạng thái tồn hàng hay hết hàng
    if ($request->filled('status')) {
        if ($request->status === 'in_stock') {
            $query->where('status', '=', 0); // Tồn hàng
        } elseif ($request->status === 'out_of_stock') {
            $query->where('status', '=', 1); // Hết hàng
        }
    }

    // Tìm kiếm theo khoảng giá
    if ($request->filled('price_range')) {
        $priceRange = explode('-', $request->price_range);
        if (count($priceRange) === 2) {
            $query->whereBetween('price_sale', [$priceRange[0], $priceRange[1]]);
        } elseif ($priceRange[0] === '5000000+') {
            $query->where('price_sale', '>', 5000000);
        }
    }

    // Lấy kết quả phân trang
    $listProducts = $query->paginate(10);

    // Trả về view với dữ liệu
    return view('admin.Products.index', compact('listProducts', 'categories', 'brands'));
}

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.products.create', compact('categories', 'brands', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'variation.size.*' => 'required|exists:sizes,id',
            'variation.color.*' => 'required|exists:colors,id',
            'variation.quantity.*' => 'required|numeric',
            'variation.price.*' => 'required|numeric',
            'variation.image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lưu sản phẩm chính
        $product = AdminProducts::create($request->only(['name', 'price', 'price_sale', 'description', 'category_id', 'brand_id']));
        $this->uploadImages($request, $product->id);

        // Lưu dữ liệu biến thể
        $sizes = $request->input('variation.size');
        $colors = $request->input('variation.color');
        $quantities = $request->input('variation.quantity');
        $prices = $request->input('variation.price');
        $images = $request->file('variation.image');

        foreach ($sizes as $index => $size) {
            $color = $colors[$index];
            $quantity = $quantities[$index];
            $price = $prices[$index];
            $imagePath = null;
            $productImage = null;

            if (isset($images[$index]) && $images[$index]->isValid()) {
                $imagePath = $images[$index]->store('images/product_variations', 'public');

                // Kiểm tra xem ảnh đã tồn tại chưa
                $existingImage = ProductImage::where('image_path', $imagePath)->first();
                if (!$existingImage) {
                    $productImage = ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                    ]);
                } else {
                    $productImage = $existingImage;
                }
            }

            ProductVariation::create([
                'product_id' => $product->id,
                'size_id' => $size,
                'color_id' => $color,
                'quantity' => $quantity,
                'price' => $price,
                'image_id' => $productImage ? $productImage->id : null,
            ]);
        }

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }



    public function show($id)
    {
        $product = AdminProducts::with(['variations.size', 'variations.color'])->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = AdminProducts::with('variations', 'images')->findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.products.edit', compact('product', 'brands', 'categories', 'sizes', 'colors'));
    }

    public function update(Request $request, $id)
    {
        $product = AdminProducts::findOrFail($id);

        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'variation.size.*' => 'required|exists:sizes,id',
            'variation.color.*' => 'required|exists:colors,id',
            'variation.quantity.*' => 'required|numeric',
            'variation.price.*' => 'required|numeric',
            'variation.image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cập nhật sản phẩm chính
        $product->update($request->only(['name', 'price', 'price_sale', 'description', 'category_id', 'brand_id']));

        // Cập nhật ảnh cho sản phẩm chính nếu có
        $this->uploadImages($request, $product->id);

        // Cập nhật các biến thể sản phẩm
        $sizes = $request->input('variation.size');
        $colors = $request->input('variation.color');
        $quantities = $request->input('variation.quantity');
        $prices = $request->input('variation.price');
        $images = $request->file('variation.image');

        // Xóa các biến thể cũ để thêm mới
        ProductVariation::where('product_id', $product->id)->delete();

        if (is_array($sizes) && is_array($colors) && is_array($quantities) && is_array($prices)) {
            foreach ($sizes as $index => $size) {
                $color = $colors[$index];
                $quantity = $quantities[$index];
                $price = $prices[$index];
                $imagePath = null;
                $productImage = null;

                // Kiểm tra xem ảnh có tồn tại và hợp lệ không
                if (isset($images[$index]) && $images[$index]->isValid()) {
                    $imagePath = $images[$index]->store('images/product_variations', 'public');

                    // Kiểm tra xem ảnh đã tồn tại chưa
                    $existingImage = ProductImage::where('image_path', $imagePath)->first();
                    if (!$existingImage) {
                        $productImage = ProductImage::create([
                            'product_id' => $product->id,
                            'image_path' => $imagePath,
                        ]);
                    } else {
                        $productImage = $existingImage;
                    }
                }

                // Tạo mới biến thể sản phẩm
                ProductVariation::create([
                    'product_id' => $product->id,
                    'size_id' => $size,
                    'color_id' => $color,
                    'quantity' => $quantity,
                    'price' => $price,
                    'image_id' => $productImage ? $productImage->id : null,
                ]);
            }
        } else {
            return back()->withErrors('Dữ liệu biến thể sản phẩm không hợp lệ.');
        }

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }



    public function destroy(string $id)
    {
        $product = AdminProducts::findOrFail($id);
        $product->delete();

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }

    protected function uploadImages(Request $request, $productId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images/products', 'public');
                ProductImage::create([
                    'product_id' => $productId,
                    'image_path' => $path,
                ]);
            }
        }
    }
}
