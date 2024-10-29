<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ProductVariation;
use App\Models\Size;

class AdminProductsController extends Controller
{
    public function index(Request $request)
    {
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

        return view('Admin.Products.index', compact('listProducts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'price_sale' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|boolean',
            'variation.size' => 'required|array',
            'variation.color' => 'required|array',
            'variation.quantity' => 'required|array',
            'variation.price' => 'required|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Đảm bảo có trường cho ảnh sản phẩm
        ]);

        $product = AdminProducts::create($request->only(['category_id', 'name', 'description', 'price', 'price_sale', 'quantity', 'status']));

        // Lưu ảnh sản phẩm
        $this->uploadImages($request, $product->id);

        // Lưu biến thể sản phẩm
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

            if (isset($images[$index]) && $images[$index]->isValid()) {
                $imagePath = $images[$index]->store('images/product_variations', 'public');
            }

            ProductVariation::create([
                'product_id' => $product->id,
                'size_id' => $size,
                'color_id' => $color,
                'quantity' => $quantity,
                'price' => $price,
                'image' => $imagePath,
            ]);
        }

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm và biến thể đã được thêm thành công.');
    }


    public function show($id)
    {
        $product = AdminProducts::with('images', 'category', 'variations.size', 'variations.color')->findOrFail($id);
        return view('Admin.products.show', compact('product'));
    }

    public function edit(int $id)
    {
        $product = AdminProducts::with(['images', 'variations'])->findOrFail($id);
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view("Admin.Products.edit", compact('product', 'categories', 'sizes', 'colors'));
    }

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
            'quantity' => 'required|integer',
            'variation.size' => 'required|array',
            'variation.color' => 'required|array',
            'variation.quantity' => 'required|array',
            'variation.price' => 'required|array',
            'variation.image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = AdminProducts::findOrFail($id);

        $product->update($request->only(['name', 'description', 'price', 'price_sale', 'quantity', 'status', 'category_id']));

        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ProductImage::findOrFail($imageId);
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }

        // Lưu ảnh sản phẩm
        $this->uploadImages($request, $product->id);

        // Xóa và thêm lại biến thể sản phẩm
        ProductVariation::where('product_id', $product->id)->delete();

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

            if (isset($images[$index]) && $images[$index]->isValid()) {
                $imagePath = $images[$index]->store('images/product_variations', 'public');
            }

            ProductVariation::create([
                'product_id' => $product->id,
                'size_id' => $size,
                'color_id' => $color,
                'quantity' => $quantity,
                'price' => $price,
                'image' => $imagePath,
            ]);
        }

        return redirect()->route('admin-products.index')->with('success', 'Sản phẩm và biến thể đã được cập nhật thành công.');
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





