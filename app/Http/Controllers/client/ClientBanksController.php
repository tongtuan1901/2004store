<?php

namespace App\Http\Controllers\client;

use App\Models\BankCard;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use App\Http\Controllers\Controller;
use App\Models\AdminYeuCauRutTien;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy tất cả các bank card
        $bankCards = BankCard::all();
        $transferRequests = Auth::user()->transferRequests()->paginate(10);
        // Tạo danh sách các chuỗi nội dung chuyển khoản ngẫu nhiên
        $transferContents = [];
        foreach ($bankCards as $bankCard) {
            $transferContents[] = $this->generateTransferContent();
        }

        // Truyền dữ liệu vào view
        return view('Client.ClientBank.ClientBank', compact('bankCards', 'transferContents', 'transferRequests'));
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

    public function history()
    {
        $userId = auth()->id(); // Lấy ID của người dùng hiện tại

        // Lấy các giao dịch của người dùng hiện tại và sắp xếp theo thời gian
        $transferRequests = TransferRequest::where('user_id', $userId)
            ->orderBy('transfer_time', 'desc')
            ->paginate(10);

        return view('Client.ClientBank.ClientBank', compact('transferRequests'));
    }
    public function viewRutTien()
    {
        $userId = auth()->id();
        $lichSuRut = AdminYeuCauRutTien::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('Client.ClientBank.ClientBankRutTien', compact('lichSuRut'));
    }
    public function RequestRutTien(Request $request)
    {
        $userId = auth()->id();

        $request->validate([
            'so_tien_rut' => 'required|numeric|min:1000|max:' . Auth::user()->balance,
            'ngan_hang' => 'required|string|max:255',
            'stk' => 'required|string|max:50',
            'customer_name'=>'required|string'
        ], [
            'so_tien_rut.required' => 'Vui lòng nhập số tiền cần rút.',
            'so_tien_rut.numeric' => 'Số tiền cần rút phải là một số.',
            'so_tien_rut.min' => 'Số tiền cần rút phải lớn hơn hoặc bằng 1,000.',
            'so_tien_rut.max' => 'Số tiền cần rút không được lớn hơn số dư hiện tại.',
            'ngan_hang.required' => 'Vui lòng chọn ngân hàng.',
            'stk.required' => 'Vui lòng nhập số tài khoản.',
            'customer_name.required' => 'Vui lòng nhập tên tài khoản.',
        ]);

        $withdrawRequest = new AdminYeuCauRutTien();
        $withdrawRequest->user_id = Auth::user()->id;
        $withdrawRequest->so_du = Auth::user()->balance;
        $withdrawRequest->so_tien_rut = $request->so_tien_rut;
        $withdrawRequest->ngan_hang = $request->ngan_hang;
        $withdrawRequest->stk = $request->stk;
        $withdrawRequest->request_type = $request->request_type;
        $withdrawRequest->is_approved = 0;
        $withdrawRequest->customer_name = $request->customer_name;
        $withdrawRequest->amount = null;
        $withdrawRequest->transfer_time = Carbon::now('Asia/Ho_Chi_Minh');
        $withdrawRequest->balance = Auth::user()->balance;
        $withdrawRequest->save();

        $user = Auth::user();
        $user->balance -= $request->so_tien_rut;
        $user->save();

        // Redirect với thông báo
        return redirect()->back()->with('success', 'Yêu cầu rút tiền của bạn đã được gửi thành công.');
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
