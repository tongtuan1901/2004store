<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SoftDeletes;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $listProducts = AdminProducts::withTrashed()
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name as category_name')
        ->whereNull('products.deleted_at')
        ->get();
    return view('Admin.Products.index', compact('listProducts'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = DB::table('categories')->get();
    return view("Admin.Products.create", compact("categories"));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'category_id' => 'required|integer|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'price_sale' => 'nullable|numeric|min:0',
        'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images_three' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'integer|in:0,1',
        'quantity' => 'required|integer|min:0',
    ]);
    $product = new AdminProducts();
    $product->category_id = $validated['category_id'];
    $product->name = $validated['name'];
    $product->description = $validated['description'] ?? null;
    $product->price = $validated['price'];
    $product->price_sale = $validated['price_sale'] ?? null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/products', 'public');
        $product->image = $imagePath;
    }

    if ($request->hasFile('gallery_images_one')) {
        $galleryImageOnePath = $request->file('gallery_images_one')->store('images/products', 'public');
        $product->gallery_images_one = $galleryImageOnePath;
    }

    if ($request->hasFile('gallery_images_two')) {
        $galleryImageTwoPath = $request->file('gallery_images_two')->store('images/products', 'public');
        $product->gallery_images_two = $galleryImageTwoPath;
    }

    if ($request->hasFile('gallery_images_three')) {
        $galleryImageThreePath = $request->file('gallery_images_three')->store('images/products', 'public');
        $product->gallery_images_three = $galleryImageThreePath;
    }

    $product->status = $validated['status'] ?? 0;
    $product->quantity = $validated['quantity'];
    $product->save();
    return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được tạo thành công');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
{
    $product = AdminProducts::find($id);
    $categories = DB::table('categories')->get();
    if (!$product) {
        return redirect()->route('admin-products.index')->with('error', 'Product not found.');
    }

    // Trả về view với thông tin sản phẩm để chỉnh sửa
    return view('Admin.Products.edit', compact('product',"categories"));
}
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
    $validated = $request->validate([
        'category_id' => 'required|integer|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'price_sale' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images_three' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status' => 'integer|in:0,1',
        'quantity' => 'required|integer|min:0',
    ]);
    $product = AdminProducts::find($id);

    if (!$product) {
        return redirect()->route('admin.products.index')->with('error', 'Product not found.');
    }
    $product->category_id = $validated['category_id'];
    $product->name = $validated['name'];
    $product->description = $validated['description'] ?? null;
    $product->price = $validated['price'];
    $product->price_sale = $validated['price_sale'] ?? null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/products', 'public');
        $product->image = $imagePath;
    }
    if ($request->hasFile('gallery_images_one')) {
        $galleryImageOnePath = $request->file('gallery_images_one')->store('images/products', 'public');
        $product->gallery_images_one = $galleryImageOnePath;
    }

    if ($request->hasFile('gallery_images_two')) {
        $galleryImageTwoPath = $request->file('gallery_images_two')->store('images/products', 'public');
        $product->gallery_images_two = $galleryImageTwoPath;
    }

    if ($request->hasFile('gallery_images_three')) {
        $galleryImageThreePath = $request->file('gallery_images_three')->store('images/products', 'public');
        $product->gallery_images_three = $galleryImageThreePath;
    }

    $product->status = $validated['status'] ?? 0;
    $product->quantity = $validated['quantity'];
    $product->save();
    return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = AdminProducts::find($id);
        if (!$product) {
            return redirect()->route('admin-products.index')->with('error', 'Product not found.');
        }
        $product->delete();
        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
    

}
