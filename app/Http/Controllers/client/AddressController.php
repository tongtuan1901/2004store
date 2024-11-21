<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function listAddresses($userId)
    {
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses; 

        return view('client.ClientAddress.index', compact('user', 'addresses'));
    }
    public function createAddress($userId){
        $user = User::with('addresses')->findOrFail($userId);
        return view('client.ClientAddress.create', compact('user'));
    }
    public function storeAddress(Request $request, $userId)
    {
        $request->validate([
            
            'street' => 'required|string|max:255',  
    'city' => 'required|string|max:255',    
    'state' => 'required|string|max:255',
        ]);
        
    
        $user = User::findOrFail($userId);
        $user->addresses()->create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'house_address' => $request->house_address, 
        ]);
    
        return redirect()->route('address.list', ['userId' => $userId])->with('success', 'Địa chỉ đã được thêm!');
    }
    public function showAddressForm($userId)
    {
        $user = User::with('addresses')->findOrFail($userId);
        $addresses = $user->addresses;
        

    return view('Client.ClientCheckout.Checkout', compact('user', 'addresses'));
    }
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('Client.ClientAddress.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        // Xác nhận và validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15', // Điều chỉnh theo định dạng số điện thoại của bạn
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'house_address' => 'nullable|string|max:255', // Nhà có thể bỏ trống
        ]);

        // Lấy địa chỉ cần cập nhật từ cơ sở dữ liệu
        $address = Address::findOrFail($id);

        // Cập nhật thông tin địa chỉ
        $address->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'house_address' => $request->house_address,  // Không bắt buộc
        ]);

        // Sau khi cập nhật thành công, chuyển hướng về danh sách địa chỉ với thông báo thành công
        return redirect()->route('address.list', ['userId' => $address->user_id])
            ->with('success', 'Địa chỉ đã được cập nhật!');
    }
        public function delete($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->route('address.list', ['userId' => $address->user_id])->with('success', 'Địa chỉ đã được xóa!');
    }
}
