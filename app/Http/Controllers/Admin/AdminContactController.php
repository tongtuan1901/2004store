<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(){
        $contact = Contact::all();
        return view('Admin.Contact.index',compact('contact'));
    }
}
