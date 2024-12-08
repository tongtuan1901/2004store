<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\InventoryLog;
use Illuminate\Http\Request;
use App\Models\AdminProducts;
use App\Models\ProductVariation;
use App\Http\Controllers\Controller;

class AdminInventoryController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm và tồn kho
     */
    public function index(Request $request)
    {
        $query = InventoryLog::query();

        // Lấy ngày bắt đầu và ngày kết thúc từ yêu cầu
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Nếu có ngày bắt đầu, thêm điều kiện vào query
        if ($startDate) {
            $query->where('created_at', '>=', $startDate . ' 00:00:00');
        }

        // Nếu có ngày kết thúc, thêm điều kiện vào query
        if ($endDate) {
            $query->where('created_at', '<=', $endDate . ' 23:59:59');
        }

        // Lấy các bản ghi tồn kho với biến thể
        $inventoryLogs = $query->with('variation')->get();

        // Lấy danh sách sản phẩm
        $products = AdminProducts::with(['variations.size', 'variations.color'])->get();

        // Tạo mảng để chứa thông tin sản phẩm cần cảnh báo
        $lowStockItems = [];

        foreach ($products as $product) {
            foreach ($product->variations as $variation) {
                if ($variation->quantity < 10) {
                    $lowStockItems[] = [
                        'product_name' => $product->name,
                        'size' => $variation->size ? $variation->size->size : 'N/A',
                        'color' => $variation->color ? $variation->color->color : 'N/A',
                        'quantity' => $variation->quantity,
                        'category' => $product->category ? $product->category->name : 'Không có danh mục'
                    ];
                }
            }
        }

        return view('admin.inventory.index', compact('inventoryLogs', 'products', 'lowStockItems'));
    }

    /**
     * Hiển thị form tạo bản ghi tồn kho mới
     */
    public function create()
    {
        // Lấy danh sách sản phẩm cùng với biến thể và thông tin màu sắc, kích thước
        $products = AdminProducts::with(['variations.color', 'variations.size'])->get();
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('admin.inventory.create', compact('products', 'categories')); // Truyền cả sản phẩm và danh mục
    }

    /**
     * Lưu thông tin tồn kho mới
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'category_id' => 'required',
            'product_id' => 'required',
            'variation_id' => 'required',
            'quantity_change' => 'required|integer',
            'note' => 'nullable|string',
        ]);
    
        // Create a new inventory log entry with current timestamp
        InventoryLog::create([
            'product_id' => $request->product_id,
            'variation_id' => $request->variation_id,
            'quantity_change' => $request->quantity_change,
            'note' => $request->note,
            'created_at' => now(), // This will automatically set the current timestamp
        ]);
    
        // Update the quantity of the selected variation
        $variation = ProductVariation::findOrFail($request->variation_id);
        $variation->quantity += $request->quantity_change;
        $variation->save();
    
        return redirect()->route('inventory.index')->with('success', 'Bản ghi tồn kho đã được thêm thành công.');
    }

    /**
     * Hiển thị form chỉnh sửa tồn kho
     */
    public function edit($id)
    {
        // Tìm bản ghi tồn kho theo ID
        $inventoryLog = InventoryLog::with(['product.variations', 'product.category'])->findOrFail($id);

        // Lấy danh sách tất cả các danh mục
        $categories = Category::all();

        // Lấy danh sách tất cả các sản phẩm kèm theo biến thể
        $products = AdminProducts::with(['variations.color', 'variations.size'])->get();

        // Trả về view với dữ liệu
        return view('admin.inventory.edit', compact('inventoryLog', 'categories', 'products'));
    }

    /**
     * Cập nhật bản ghi tồn kho
     */
    public function update(Request $request, $id)
    {
        $inventoryLog = InventoryLog::findOrFail($id);
        
        // Lấy thông tin biến thể và số lượng thay đổi
        $variation = ProductVariation::findOrFail($request->variation_id);
        $quantityChange = $request->quantity_change;
    
        // Cập nhật số lượng trong kho
        $variation->quantity += $quantityChange;
    
        // Lưu thay đổi
        $variation->save();
    
        // Cập nhật bản ghi tồn kho với timestamp hiện tại
        $inventoryLog->update([
            'category_id' => $request->category_id,
            'product_id' => $request->product_id,
            'variation_id' => $request->variation_id,
            'quantity_change' => $quantityChange,
            'note' => $request->note,
            'updated_at' => now(), // This will automatically update the timestamp
        ]);
    
        return redirect()->route('inventory.index')->with('success', 'Cập nhật thành công!');
    }
    

    /**
     * Xóa bản ghi tồn kho
     */
    public function destroy($id)
    {
        $inventoryLog = InventoryLog::findOrFail($id);

        // Điều chỉnh lại số lượng sản phẩm
        $product = $inventoryLog->product;
        $product->quantity -= $inventoryLog->quantity_change;
        $product->save();

        $inventoryLog->delete();

        return redirect()->route('inventory.index')->with('success', 'Xóa bản ghi tồn kho thành công.');
    }
}
