<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\AdminProducts;
use App\Models\OderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientOrderControler extends Controller
{
    public function listOrder($userId)
    {
        $userOrder = User::with([
            'orders.orderItems.product.images', // Truy xuất hình ảnh sản phẩm qua orderItems
        ])->where('id', $userId)->first();
    
        if (!$userOrder) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
    
        return view('Client.ClientOrders.index', compact('userOrder'));
    }

    public function placeOrder(Request $request)
    {
        // Giả sử bạn có các thông tin cần thiết từ $request để tạo đơn hàng
        $order = new OderItem();
        $order->user_id = auth()->id();
        $order->status = 'Chờ xử lý'; // Hoặc trạng thái mong muốn
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->save();

        // Thêm sản phẩm vào đơn hàng
        $productsWithDetails = [];
        foreach ($request->products as $productId => $quantity) {
            $product = AdminProducts::find($productId);
    
            // Kiểm tra nếu sản phẩm tồn tại
            if ($product) {
                // Thêm sản phẩm vào đơn hàng
                $order->products()->attach($productId, ['quantity' => $quantity]);
    
                // Lấy thông tin sản phẩm (tên và hình ảnh)
                $imagePath = $product->images->isNotEmpty() ? Storage::url('images/products/' . $product->images->first()->image_path) : asset('path/to/default/image.png');
                $productsWithDetails[] = [
                    'name' => $product->name,
                    'image' => $imagePath,
                    'quantity' => $quantity,
                ];
            }
        }
    
        // Chuyển hướng về trang danh sách đơn hàng và truyền thông tin sản phẩm
        return redirect()->route('client.orders.index', ['userId' => auth()->id()])
                         ->with('order', $order)
                         ->with('products', $productsWithDetails);
    }
    public function cancelOrder($id)
{
    $order = AdminOrder::find($id);
    
    if ($order && $order->status !== 'Hủy') {
        $order->status = 'Hủy';  // Cập nhật trạng thái đơn hàng thành "canceled"
        $order->save();

        // Chuyển hướng về danh sách đơn hàng sau khi hủy thành công
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã bị hủy.');
    }

    return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại hoặc đã bị hủy.');
}
}