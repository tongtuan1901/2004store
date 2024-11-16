<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $userId = auth()->id(); // Lấy ID của user hiện tại
    return view('Client/ClientContact/listContact', compact('userId'));
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
    // Xử lý dữ liệu từ form
    $validatedData = $request->validate([
        'contact.name' => 'required|string|max:255',
        'contact.phone' => 'required|numeric',
        'contact.email' => 'required|email',
        'contact.body' => 'required|string|max:1000',
    ]);

    // Lưu dữ liệu vào bảng `contacts`
    $contact = new Contact();
    $contact->name = $validatedData['contact']['name'];
    $contact->phone = $validatedData['contact']['phone'];
    $contact->email = $validatedData['contact']['email'];
    $contact->message = $validatedData['contact']['body'];
    $contact->save();

    return redirect()->back()->with('success', 'Thông tin đã được gửi thành công!');
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
