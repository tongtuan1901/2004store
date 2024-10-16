<?php

namespace App\Http\Controllers\Admin;


use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $categories = Category::all();
        $listProducts = AdminProducts::with(['category', 'images'])->withTrashed()->select('products.*')->get();
        $query = AdminProducts::query();

        // Nếu có tìm kiếm, áp dụng bộ lọc
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Phân trang sản phẩm
        $listProducts = $query->paginate(10);
        return view('Admin.Products.index', compact('listProducts', 'categories'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = DB::table('categories')->get();
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        $colors = ['Đỏ', 'Xanh', 'Vàng', 'Trắng', 'Đen'];
        return view("Admin.Products.create", compact("categories", 'sizes', 'colors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'status' => 'required|integer',
            'sizes' => 'nullable|array',
            'colors' => 'nullable|array',
            'quantity' => 'required|integer',
        ]);

        // Chuyển đổi sizes và colors thành chuỗi
        $sizes = implode(',', $request->sizes);
        $colors = implode(',', $request->colors);

        // Tạo sản phẩm mới
        $product = AdminProducts::create($request->except('images', 'sizes', 'colors') + ['sizes' => $sizes, 'colors' => $colors]);

        // Xử lý hình ảnh
        $this->uploadImages($request, $product->id);

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được thêm thành công.');

    }

    /**
     * Display the specified resource.
     */

    public function show($id)
{
    $product = AdminProducts::with('images', 'category')->findOrFail($id);
    return view('Admin.products.show', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(int $id)
    {
        $product = AdminProducts::with('images')->findOrFail($id);
        $product->sizes = explode(',', $product->sizes); // Chuyển đổi chuỗi thành mảng
        $product->colors = explode(',', $product->colors); // Chuyển đổi chuỗi thành mảng

        $categories = Category::all(); 
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        $colors = ['Đỏ', 'Xanh', 'Vàng', 'Trắng', 'Đen'];
        
        return view("Admin.Products.edit", compact('product', 'categories', 'sizes', 'colors'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'status' => 'required|integer',
            'sizes' => 'nullable|array',
            'colors' => 'nullable|array',
            'quantity' => 'required|integer',
        ]);

        $product = AdminProducts::findOrFail($id);

        // Chuyển đổi sizes và colors thành chuỗi
        $sizes = implode(',', $request->sizes);
        $colors = implode(',', $request->colors);

        $product->update($request->except('images', 'sizes', 'colors') + ['sizes' => $sizes, 'colors' => $colors]);

        // Xử lý xóa hình ảnh đã chọn
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ProductImage::findOrFail($imageId);
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }

        // Xử lý hình ảnh mới
        $this->uploadImages($request, $product->id);

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = AdminProducts::findOrFail($id);
        $product->delete();

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }

    /**
     * Upload images for the specified product.
     */
    protected function uploadImages(Request $request, $productId)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images/products', 'public'); // Đường dẫn lưu hình ảnh
                ProductImage::create([
                    'product_id' => $productId,
                    'image_path' => $path,
                ]);
            }
        }
    }
}

