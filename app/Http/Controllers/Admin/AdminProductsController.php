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
        $brands = Brand::all();
        $categories = Category::all();
        $listProducts = AdminProducts::with(['category', 'images', 'variations.size', 'variations.color'])
            ->withTrashed()
            ->select('products.*')
            ->get();

        $query = AdminProducts::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('price_range')) {
            $priceRange = explode('-', $request->price_range);
            if (count($priceRange) === 2) {
                $query->whereBetween('price_sale', [$priceRange[0], $priceRange[1]]);
            } elseif ($priceRange[0] === '500000+') {
                $query->where('price_sale', '>', 500000);
            }
        }

        $listProducts = $query->paginate(10);

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
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0|gte:price_sale',
                'price_sale' => 'nullable|numeric|min:0',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'variation.size.*' => 'required|exists:sizes,id',
                'variation.color.*' => 'required|exists:colors,id',
                'variation.quantity.*' => 'required|numeric|min:0',
                'variation.price.*' => 'required|numeric|min:0',
                'variation.image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'name.required' => 'Trường tên sản phẩm không được để trống.',
                'price.required' => 'Trường giá không được để trống.',
                'price.numeric' => 'Trường giá phải là một số hợp lệ.',
                'price_sale.required' => 'Trường giá không được để trống.',
                'price_sale.numeric' => 'Trường giá phải là một số hợp lệ.',
                'price.min' => 'Giá không được nhỏ hơn 0.',
                'price.gte' => 'Giá phải lớn hơn hoặc bằng giá khuyến mãi.',
                'price_sale.numeric' => 'Giá khuyến mãi phải là một số hợp lệ.',
                'price_sale.min' => 'Giá khuyến mãi không được nhỏ hơn 0.',
                'description.required' => 'Trường mô tả không được để trống.',
                'category_id.required' => 'Bạn cần chọn danh mục sản phẩm.',
                'category_id.exists' => 'Danh mục không hợp lệ.',
                'variation.size.*.required' => 'Trường kích thước là bắt buộc.',
                'variation.size.*.exists' => 'Kích thước không hợp lệ.',
                'variation.color.*.required' => 'Trường màu sắc là bắt buộc.',
                'variation.color.*.exists' => 'Màu sắc không hợp lệ.',
                'variation.quantity.*.required' => 'Trường số lượng là bắt buộc.',
                'variation.quantity.*.numeric' => 'Số lượng phải là một số hợp lệ.',
                'variation.quantity.*.min' => 'Số lượng không được nhỏ hơn 0.',
                'variation.price.*.required' => 'Trường giá là bắt buộc.',
                'variation.price.*.numeric' => 'Giá phải là một số hợp lệ.',
                'variation.price.*.min' => 'Giá không được nhỏ hơn 0.',
                'variation.image.*.image' => 'File tải lên phải là ảnh.',
                'variation.image.*.mimes' => 'Ảnh phải thuộc định dạng: jpeg, png, jpg, gif.',
                'variation.image.*.max' => 'Ảnh không được lớn hơn 2MB.',
            ]
        );
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
            'price' => 'required|numeric|min:0|gte:price_sale',
            'price_sale' => 'nullable|numeric|min:0',
            'introduction' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'variations.*.price' => 'nullable|numeric|min:0',
            'variations.*.price_sale' => 'nullable|numeric|min:0',
        ], [
            'name.required' => 'Tiêu đề sản phẩm không được để trống.',
            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'price.min' => 'Giá sản phẩm không được để âm.',
            'price.gte' => 'Giá phải lớn hơn hoặc bằng giá khuyến mãi.',
            'price_sale.numeric' => 'Giá khuyến mãi phải là một số.',
            'price_sale.min' => 'Giá khuyến mãi không được để âm.',
            'introduction.required' => 'Giới thiệu không được để trống.',
            'description.required' => 'Mô tả không được để trống.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.min' => 'Số lượng không được âm.',
            'variations.*.price.min' => 'Giá ở biến thể không được để âm.',
            'variations.*.price_sale.min' => 'Giá khuyến mãi ở biến thể không được để âm.',
        ]);

        // Cập nhật sản phẩm chính
        $product->update($request->only(['name', 'price', 'price_sale', 'description', 'category_id']));

        // **Lưu ảnh sản phẩm chính (is_variant = false)**
        if ($request->hasFile('images')) {
            // Xóa ảnh cũ
            ProductImage::where('product_id', $product->id)->where('image_id', null)->delete();

            // Thêm ảnh mới
            foreach ($request->file('images') as $image) {
                $path = $image->store('images/products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'image_id' => null,  // Ảnh chính của sản phẩm không có image_id
                ]);
            }
        }

        // **Cập nhật các biến thể**
        $sizes = $request->input('variation.size');
        $colors = $request->input('variation.color');
        $quantities = $request->input('variation.quantity');
        $prices = $request->input('variation.price');
        $images = $request->file('variation.image');

        foreach ($sizes as $index => $size) {
            $color = $colors[$index];
            $quantity = $quantities[$index];
            $price = $prices[$index];

            $variation = ProductVariation::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'size_id' => $size,
                    'color_id' => $color,
                ],
                [
                    'quantity' => $quantity,
                    'price' => $price,
                ]
            );

            // **Lưu ảnh biến thể (is_variant = true)**
            if (isset($images[$index]) && $images[$index]->isValid()) {
                // Xóa ảnh cũ
                if ($variation->image) {
                    Storage::disk('public')->delete($variation->image->image_path);
                    $variation->image->delete();
                }

                $imagePath = $images[$index]->store('images/product_variations', 'public');
                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                    'image_id' => $variation->id, // Liên kết ảnh với biến thể
                ]);

                $variation->image_id = $productImage->id;
                $variation->save();
            }
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
