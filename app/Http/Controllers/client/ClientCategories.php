<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\admin\AdminProductsController;
use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;


class ClientCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $categories = Category::all();
    //     $products = AdminProducts::with(['brand', 'images'])->paginate(8); // Lấy danh sách sản phẩm với các quan hệ thương hiệu và hình ảnh
    //     $colors = Color::all();
    //     $sizes = Size::all();
    //     $selectedCategories = [];
    //     $selectedPrices = [];
    //     $selectedFilters = [];
    //     $selectedColors = [];
    //     $selectedSizes = [];

    //     return view("Client.ClientCategories.ListCategories", compact('categories', 'products', 'colors', 'sizes', 'selectedCategories', 'selectedPrices', 'selectedFilters', 'selectedColors', 'selectedSizes'));
    // }
    public function index($id = null)
{
    $categories = Category::all(); // Lấy tất cả danh mục
    $colors = Color::all();        // Lấy danh sách màu
    $sizes = Size::all();          // Lấy danh sách kích thước

    // Nếu có ID danh mục, lọc sản phẩm theo danh mục
    if ($id) {
        $products = AdminProducts::with(['brand', 'images'])
            ->where('category_id', $id)
            ->paginate(8); // Lọc theo category_id
        $selectedCategory = Category::findOrFail($id); // Lấy danh mục được chọn
    } else {
        // Nếu không có ID, lấy tất cả sản phẩm
        $products = AdminProducts::with(['brand', 'images'])->paginate(8);
        $selectedCategory = null; // Không có danh mục nào được chọn
    }

    $selectedCategories = [];
    $selectedPrices = [];
    $selectedFilters = [];
    $selectedColors = [];
    $selectedSizes = [];

    return view("Client.ClientCategories.ListCategoriesAll", compact(
        'categories',
        'products',
        'colors',
        'sizes',
        'selectedCategories',
        'selectedPrices',
        'selectedFilters',
        'selectedColors',
        'selectedSizes',
        'selectedCategory'
    ));
}
    public function listCategoryOne($id)
{
    $categories = Category::all(); // Lấy tất cả danh mục
    $colors = Color::all();        // Lấy danh sách màu
    $sizes = Size::all();          // Lấy danh sách kích thước

    // Nếu có ID danh mục, lọc sản phẩm theo danh mục
    if ($id) {
        $products = AdminProducts::with(['brand', 'images'])
            ->where('category_id', $id)
            ->paginate(8); // Lọc theo category_id
        $selectedCategory = Category::findOrFail($id); // Lấy danh mục được chọn
    }

    $selectedCategories = [];
    $selectedPrices = [];
    $selectedFilters = [];
    $selectedColors = [];
    $selectedSizes = [];

    return view("Client.ClientCategories.ListCategories", compact(
        'categories',
        'products',
        'colors',
        'sizes',
        'selectedCategories',
        'selectedPrices',
        'selectedFilters',
        'selectedColors',
        'selectedSizes',
        'selectedCategory'
    ));
}

    public function showByBrand($id)
    {
        $categories = Category::all();
        $products = AdminProducts::where('brand_id', $id)->paginate(8);
        $brand = Brand::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $selectedCategories = [];
        $selectedPrices = [];
        $selectedFilters = [];
        $selectedColors = [];
        $selectedSizes = [];

        return view("Client.ClientCategories.ListBrand", compact('categories', 'products', 'colors', 'sizes', 'selectedCategories', 'selectedPrices', 'selectedFilters', 'selectedColors', 'selectedSizes', 'brand'));
    }

    public function filter(Request $request)
    {
        // Lấy các bộ lọc đã chọn từ request
        $selectedCategories = $request->input('category', []);
        $selectedPrices = $request->input('price', []);
        $selectedColors = $request->input('color', []);
        $selectedSizes = $request->input('size', []);

        // Khởi tạo mảng để lưu các bộ lọc đã chọn
        $selectedFilters = [];

        // Lọc theo danh mục
        if (!empty($selectedCategories)) {
            $categories = Category::whereIn('id', $selectedCategories)->get();
            foreach ($categories as $category) {
                $selectedFilters['category[' . $category->id . ']'] = 'Danh mục: ' . $category->name;
            }
        }

        // Lọc theo giá
        if (!empty($selectedPrices)) {
            foreach ($selectedPrices as $priceRange) {
                $selectedFilters['price[' . $priceRange . ']'] = match ($priceRange) {
                    '<1000000' => 'Dưới 1.000.000₫',
                    '>=1000000 AND <=3000000' => 'Từ 1.000.000₫ - 3.000.000₫',
                    '>=3000000 AND <=5000000' => 'Từ 3.000.000₫ - 5.000.000₫',
                    '>=5000000 AND <=10000000' => 'Từ 5.000.000₫ - 10.000.000₫',
                    '>10000000' => 'Trên 10.000.000₫',
                    default => '',
                };
            }
        }

        // Lọc theo màu sắc
        if (!empty($selectedColors)) {
            $colors = Color::whereIn('id', $selectedColors)->get();
            foreach ($colors as $color) {
                $selectedFilters['color[' . $color->id . ']'] = 'Màu: ' . $color->color;
            }
        }

        // Lọc theo kích thước
        if (!empty($selectedSizes)) {
            $sizes = Size::whereIn('id', $selectedSizes)->get();
            foreach ($sizes as $size) {
                $selectedFilters['size[' . $size->id . ']'] = 'Kích thước: ' . $size->size;
            }
        }

        // Lọc sản phẩm
        $products = AdminProducts::query();

        // Lọc theo danh mục
        if (!empty($selectedCategories)) {
            $products->whereIn('category_id', $selectedCategories);
        }

        // Lọc theo giá
        if (!empty($selectedPrices)) {
            foreach ($selectedPrices as $range) {
                if (strpos($range, '<') === 0) {
                    $products->where('price', '<', (int)str_replace('<', '', $range));
                } elseif (strpos($range, '>=') === 0 && strpos($range, '<=') !== false) {
                    list($minPrice, $maxPrice) = explode(' AND ', str_replace(['>=', '<='], '', $range));
                    $products->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
                } elseif (strpos($range, '>') === 0) {
                    $products->where('price', '>', (int)str_replace('>', '', $range));
                }
            }
        }

        // Lọc theo màu sắc
        if (!empty($selectedColors)) {
            $products->whereHas('variations', function ($query) use ($selectedColors) {
                $query->whereIn('color_id', $selectedColors);
            });
        }

        // Lọc theo kích thước
        if (!empty($selectedSizes)) {
            $products->whereHas('variations', function ($query) use ($selectedSizes) {
                $query->whereIn('size_id', $selectedSizes);
            });
        }

        // Áp dụng phân trang
        $products = $products->paginate(8);  // Sử dụng paginate thay vì get()

        // Lấy tất cả danh mục, màu sắc, và kích thước
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();

        // Trả về view với dữ liệu cần thiết
        return view('Client.ClientCategories.ListCategories', [
            'products' => $products, // Đây là đối tượng Paginator
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'selectedFilters' => $selectedFilters,
            'selectedCategories' => $selectedCategories,
            'selectedPrices' => $selectedPrices,
            'selectedColors' => $selectedColors,
            'selectedSizes' => $selectedSizes,
        ]);
    }





    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
