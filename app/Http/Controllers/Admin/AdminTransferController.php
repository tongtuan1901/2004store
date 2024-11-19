<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;

class AdminTransferController extends Controller
{
    public function index(Request $request)
    {
        // Lọc theo nội dung chuyển khoản
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        
        $transferRequests = TransferRequest::where('is_approved', false);
    
        // Lọc theo nội dung chuyển khoản
        if ($search) {
            $transferRequests->where('transfer_content', 'like', '%' . $search . '%');
        }
    
        // Lọc theo khoảng thời gian
        if ($startDate) {
            $transferRequests->whereDate('transfer_time', '>=', $startDate);
        }
    
        if ($endDate) {
            $transferRequests->whereDate('transfer_time', '<=', $endDate);
        }
    
        $transferRequests = $transferRequests->get();
    
        return view('admin.transfer-requests.index', compact('transferRequests'));
    }
    
    

    public function approve($id)
    {
        // Tìm yêu cầu theo ID
        $transferRequest = TransferRequest::findOrFail($id);
    
        // Kiểm tra nếu người dùng có tồn tại
        $user = $transferRequest->user;  // Giả sử bạn đã liên kết với model User thông qua khóa ngoại
    
        if (!$user) {
            return redirect()->route('admin.transfer-requests.index')->with('error', 'Khách hàng không tồn tại.');
        }
    
        // Cập nhật số dư của khách hàng (ví dụ: cộng số tiền vào tài khoản của khách hàng)
        $user->balance += $transferRequest->amount;
        $user->save();
    
        // Đánh dấu yêu cầu là đã duyệt
        $transferRequest->is_approved = true;
        $transferRequest->save();
    
        // Chuyển hướng đến danh sách yêu cầu đã duyệt
        return redirect()->route('admin.approved-customers')->with('success', 'Yêu cầu đã được duyệt.');
    }
    

    public function reject($id)
    {
        // Tìm yêu cầu và xóa nếu bị từ chối
        $transferRequest = TransferRequest::findOrFail($id);
        $transferRequest->delete();

        return redirect()->route('admin.transfer-requests.index')->with('success', 'Yêu cầu đã bị từ chối.');
    }

    public function approvedCustomers(Request $request)
    {
        // Lọc theo nội dung chuyển khoản
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        
        // Khởi tạo truy vấn
        $approvedRequests = TransferRequest::where('is_approved', true);
    
        // Lọc theo nội dung chuyển khoản
        if ($search) {
            $approvedRequests->where('transfer_content', 'like', '%' . $search . '%');
        }
    
        // Lọc theo khoảng thời gian
        if ($startDate) {
            $approvedRequests->whereDate('transfer_time', '>=', $startDate);
        }
    
        if ($endDate) {
            $approvedRequests->whereDate('transfer_time', '<=', $endDate);
        }
    
        // Lấy danh sách yêu cầu đã duyệt
        $approvedRequests = $approvedRequests->get();
    
        return view('admin.transfer-requests.approved-customers', compact('approvedRequests'));
    }
    
}

