<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Http\Controllers\Controller;
use App\Models\AdminOrder;
use App\Models\AdminProducts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

    class AdminOrdersController extends Controller
    {

        public function index(Request $request)
{
    // Khởi tạo query với các quan hệ cần thiết
    $query = AdminOrder::with(['user', 'orderItems.variation.size', 'orderItems.variation.color'])
        ->where('status', '!=', 'Hủy');

    // Xử lý tìm kiếm
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('id', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%$search%");
                })
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%");
        });
    }

    // Lọc theo trạng thái
    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    // Lấy danh sách đơn hàng
    $orders = $query->get();

    return view('Admin.orders.index', compact('orders'));
}


    public function approveIndex()
    {
        // Lấy danh sách các đơn hàng có trạng thái 'Chờ xử lý'
        $orders = AdminOrder::where('status', 'Chờ xử lý')->get();
        return view('Admin.orders.approve_index', compact('orders'));
    }

    public function receivedIndex()
    {
        $orders = AdminOrder::where('status', 'Hoàn thành')->get();
        return view('Admin.orders.received_index', compact('orders'));
    }

    public function create()
    {
        $products = AdminProducts::all();
        // session()->put('cart_total', $order->total);
        return view('admin.orders.create', compact('products'));
    }

    public function generatePDF($id)
    {
        $order = AdminOrder::with('products')->findOrFail($id);
        session()->put('cart_total', $order->total);
        $pdf = PDF::loadView('admin.orders.pdf', compact('order'));
        return $pdf->download('order_' . $order->id . '.pdf');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $order = AdminOrder::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'total' => 0,
            'status' => $validated['status'],
        ]);


        $total = 0;
        foreach ($validated['products'] as $index => $productId) {
            $product = AdminProducts::find($productId);
            $quantity = $validated['quantities'][$index];
            $order->products()->attach($productId, ['quantity' => $quantity]);
            $total += $product->price * $quantity;
        }
        $order->update(['total' => $total]);

        return redirect()->route('admin-orders.approve.index')->with('success', 'Đơn hàng đã được tạo thành công!');
    }


    public function show($id)
    {
        $order = AdminOrder::with('user','products.variations.size', 'products.variations.color')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }




    public function edit($id)
    {
        $order = AdminOrder::with('products')->findOrFail($id);
        $products = AdminProducts::all();
        return view('admin.orders.edit', compact('order', 'products'));
    }
    
    public function update(Request $request, $id)
    {
        $order = AdminOrder::findOrFail($id);

        if ($order->status === 'Hoàn thành') {
            return redirect()->route('admin-orders.index')->with('error', 'Trạng thái đơn hàng đã hoàn thành, không thể cập nhật!');
        }

        $validStatusFlow = [
            'Chờ xử lý' => 'Đang xử lý',
            'Đang xử lý' => 'Đang giao hàng',
            'Đang giao hàng' => 'Hoàn thành',
        ];

        if ($request->has('status')) {
            $validated = $request->validate([
                'status' => 'required|string|max:50',
            ]);

            $newStatus = $validated['status'];

            if (!isset($validStatusFlow[$order->status]) || $validStatusFlow[$order->status] !== $newStatus) {
                return redirect()->route('admin-orders.index')->with(
                    'error',
                    'Trạng thái không hợp lệ! Bạn phải cập nhật theo thứ tự: ' . implode(' → ', array_keys($validStatusFlow)) . ' → Hoàn thành.'
                );
            }
            if ($newStatus === 'Đang xử lý' && $order->status === 'Chờ xử lý') {
                $order->forceFill(['processing_time' => now(), 'status' => $newStatus])->save();
            } elseif ($newStatus === 'Đang giao hàng' && $order->status === 'Đang xử lý') {
                $order->forceFill(['shipping_time' => now(), 'status' => $newStatus])->save();
            } elseif ($newStatus === 'Hoàn thành' && $order->status === 'Đang giao hàng') {
                $order->forceFill(['completed_time' => now(), 'status' => $newStatus])->save();
            }

            $order->update(['status' => $newStatus]);
            return redirect()->route('admin-orders.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật!');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'total' => 'required|numeric',
            'status' => 'required|string|max:50',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $order->update($validated);
        $order->products()->detach();
        foreach ($validated['products'] as $index => $productId) {
            $order->products()->attach($productId, ['quantity' => $validated['quantities'][$index]]);
        }
        session()->put('cart_total', $order->total);
        return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
    }

    public function approve($id)
    {
        $order = AdminOrder::findOrFail($id);
        session()->put('cart_total', $order->total);
        return view('admin.orders.approve', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = AdminOrder::findOrFail($id);

        // Kiểm tra trạng thái và cập nhật
        if ($order->status === 'Chờ xử lý') {
            $order->update(['status' => 'Đang xử lý']);
            return redirect()->route('admin-orders.index')->with('success', 'Đơn hàng đã được duyệt thành công!');
        }

        return redirect()->route('admin-orders.index')->with('error', 'Đơn hàng không thể duyệt!');
    }
    public function destroy($id)
    {
        $order = AdminOrder::findOrFail($id);
        $order->delete();

        return redirect()->route('admin-orders.approve.index')->with('success', 'Đơn hàng đã được xóa thành công!');
    }

    public function restore($id)
    {
        $order = AdminOrder::onlyTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('admin-orders.deleted')->with('success', 'Đơn hàng đã được khôi phục thành công!');
    }


    public function forceDelete($id)
    {
        $order = AdminOrder::onlyTrashed()->findOrFail($id);
        $order->forceDelete();

        return redirect()->route('admin-orders.deleted')->with('success', 'Đơn hàng đã được xóa vĩnh viễn thành công!');
    }

    // return redirect()->route('admin-orders.index')->with('error', 'Đơn hàng không thể duyệt!');


    public function deletedOrders()
    {
        $deletedOrders = AdminOrder::onlyTrashed()->get(); // Lấy tất cả các đơn hàng đã xóa
        return view('Admin.orders.deleted', compact('deletedOrders'));
    }





    public function listAdrress()
    {
        $users = User::all();

        return view('Admin.orders.listAddress',compact('users'));
    }
    public function showAddress($userId)
    {
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses;

        return view('Admin.orders.showAddress',compact('user','addresses'));
    }
    public function cancelOrder($orderId)
    {
        $order = AdminOrder::findOrFail($orderId);
        $order->status = 'Hủy'; // Change status to "Hủy"
        $order->save();

        // Redirect lại trang danh sách đơn hàng
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy');
    }
public function listDonHangDaHuy()
{
    $canceledOrders = AdminOrder::where('status', 'Hủy')->get(); // Fetch all canceled orders
    $donHangDaHuy = AdminOrder::where('status', 'Hủy')
                             ->with(['orderItems', 'orderItems.product', 'orderItems.variation.size', 'orderItems.variation.color'])
                             ->get();
    return view('Admin.orders.listDonHangHuy', compact('canceledOrders','donHangDaHuy'));
}
}
