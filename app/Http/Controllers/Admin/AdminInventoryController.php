<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminProducts;
use App\Models\Category;
use App\Models\InventoryLog;
use Illuminate\Http\Request;

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

        // Lấy các bản ghi tồn kho
        $inventoryLogs = $query->with(['product', 'product.category'])->get();

        // Lấy danh sách sản phẩm nếu cần
        $products = AdminProducts::all();
        
        return view('admin.inventory.index', compact('inventoryLogs', 'products'));
    }

    /**
     * Hiển thị form tạo bản ghi tồn kho mới
     */
    public function create()
    {
        $products = AdminProducts::all();
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('admin.inventory.create', compact('products', 'categories')); // Truyền cả sản phẩm và danh mục
    }

    /**
     * Lưu thông tin tồn kho mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_change' => 'required|integer',
            'note' => 'nullable|string',
        ]);
    
        // Tạo bản ghi tồn kho mới
        $inventoryLog = new InventoryLog();
        $inventoryLog->product_id = $request->product_id;
        $inventoryLog->quantity_change = $request->quantity_change;
        $inventoryLog->note = $request->note;
        $inventoryLog->save();
    
        // Cập nhật số lượng sản phẩm
        $product = AdminProducts::find($request->product_id);
    
        // Kiểm tra số lượng không âm
        if ($product->quantity + $request->quantity_change < 0) {
            return redirect()->back()->withErrors('Số lượng sản phẩm không thể âm.');
        }
    
        $product->quantity += $request->quantity_change; // Cộng thêm số lượng thay đổi
        $product->save();
    
        return redirect()->route('inventory.index')->with('success', 'Bản ghi tồn kho đã được thêm và số lượng sản phẩm đã được cập nhật.');
    }
    

    /**
     * Hiển thị form chỉnh sửa tồn kho
     */
    public function edit($id)
    {
        $inventoryLog = InventoryLog::findOrFail($id);
    $products = AdminProducts::all();
    $categories = Category::all();
    $selectedProductId = $inventoryLog->product_id; // Lấy ID sản phẩm từ bản ghi tồn kho

    return view('admin.inventory.edit', compact('inventoryLog', 'products', 'categories', 'selectedProductId'));
    }

    /**
     * Cập nhật bản ghi tồn kho
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_change' => 'required|integer',
            'note' => 'nullable|string',
        ]);
    
        // Lấy bản ghi tồn kho cũ
        $inventoryLog = InventoryLog::find($id);
        $oldQuantityChange = $inventoryLog->quantity_change;
    
        // Cập nhật thông tin bản ghi tồn kho
        $inventoryLog->quantity_change = $request->quantity_change;
        $inventoryLog->note = $request->note;
        $inventoryLog->save();
    
        // Tính toán lại số lượng sản phẩm
        $product = AdminProducts::find($request->product_id);
    
        // Kiểm tra số lượng không âm
        if ($product->quantity - $oldQuantityChange + $request->quantity_change < 0) {
            return redirect()->back()->withErrors('Số lượng sản phẩm không thể âm.');
        }
    
        // Trừ số lượng cũ và cộng số lượng mới
        $product->quantity -= $oldQuantityChange;
        $product->quantity += $request->quantity_change;
        $product->save();
    
        return redirect()->route('inventory.index')->with('success', 'Bản ghi tồn kho đã được cập nhật và số lượng sản phẩm đã được điều chỉnh.');
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
