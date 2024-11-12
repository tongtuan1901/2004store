<?php

namespace App\Http\Controllers\client;

use App\Models\BankCard;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;

class ClientBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả các bank card
        $bankCards = BankCard::all();  
    
        // Tạo danh sách các chuỗi nội dung chuyển khoản ngẫu nhiên
        $transferContents = [];
        foreach ($bankCards as $bankCard) {
            $transferContents[] = $this->generateTransferContent();
        }
    
        // Truyền dữ liệu vào view
        return view('Client.ClientBank.ClientBank', compact('bankCards', 'transferContents'));
    }
    
    private function generateTransferContent()
    {
        // Hàm tạo chuỗi ngẫu nhiên 15 ký tự
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $content = '';
        for ($i = 0; $i < 15; $i++) {
            $content .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $content;
    }
    public function storeTransferRequest(Request $request)
    {
        // Giả sử bạn đã xác thực người dùng (vì bạn đang sử dụng user_id)
        $userId = auth()->id(); // Lấy ID của người dùng hiện tại
        $customerName = auth()->user()->name; // Lấy tên người dùng hiện tại
    
        // Lưu trữ dữ liệu nạp tiền vào cơ sở dữ liệu
        TransferRequest::create([
            'user_id' => $userId,  // Thêm user_id vào dữ liệu
            'customer_name' => $customerName,  // Thêm tên khách hàng vào dữ liệu
            'amount' => $request->amount,
            'transfer_content' => $request->transfer_content,
            'transfer_time' => now(), // Lấy thời gian hiện tại
            'balance' => 0, // Bạn có thể thêm logic tính số dư ở đây nếu cần
        ]);
    
        // Chuyển hướng với thông báo thành công
        return redirect()->back()->with('success', 'Yêu cầu nạp tiền đã được gửi.');
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     */
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
