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
        $request->validate([
            'street' => 'required|string|max:255|regex:/^[^\d]*$/',
            'city' => 'required|string|max:255|regex:/^[^\d]*$/',
            'state' => 'required|string|max:255|regex:/^[^\d]*$/',
        ]);

        $address = Address::findOrFail($id);
        $address->update($request->all());

        return redirect()->route('address.list', ['userId' => $address->user_id])->with('success', 'Địa chỉ đã được cập nhật!');
    }

        public function delete($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->route('address.list', ['userId' => $address->user_id])->with('success', 'Địa chỉ đã được xóa!');
    }
}
