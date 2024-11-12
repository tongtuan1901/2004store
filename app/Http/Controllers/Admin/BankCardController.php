<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankCardController extends Controller
{
    public function index()
    {
        $bankCards = BankCard::all();
        return view('Admin.bankCards.index', compact('bankCards'));
    }

    public function create()
    {
        return view('Admin.bankCards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'card_number' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->only(['bank_name', 'account_holder_name', 'card_number']);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bank_cards', 'public');
        }

        BankCard::create($data);

        return redirect()->route('bank-cards.index')->with('success', 'Thêm thẻ ngân hàng thành công!');
    }

    public function edit(BankCard $bankCard)
    {
        return view('Admin.bankCards.edit', compact('bankCard'));
    }

    public function update(Request $request, BankCard $bankCard)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'card_number' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->only(['bank_name', 'account_holder_name', 'card_number']);
        
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            if ($bankCard->image) {
                Storage::disk('public')->delete($bankCard->image);
            }
            $data['image'] = $request->file('image')->store('bank_cards', 'public');
        }

        $bankCard->update($data);

        return redirect()->route('bank-cards.index')->with('success', 'Cập nhật thẻ ngân hàng thành công!');
    }

    public function destroy(BankCard $bankCard)
    {
        if ($bankCard->image) {
            Storage::disk('public')->delete($bankCard->image);
        }

        $bankCard->delete();

        return redirect()->route('bank-cards.index')->with('success', 'Xóa thẻ ngân hàng thành công!');
    }
}

