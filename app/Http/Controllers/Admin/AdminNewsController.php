<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('news')->get();
        return view('admin\new.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin\new.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([

            'title'=>'required',
            'content'=>'required',
            'image'=>'required',
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề',
            'content.required'=>'Vui lòng nhập nội dung',
            'image.required'=>'Vui lòng nhập ảnh',
        ]);

        if($request->hasFile('image')) {
            $url = Storage::put('new', $request->file('image'));
        } else {
            $url = '';
        }

        DB::table('news')->insert([
            'title' => $request->title,
            'image' => $url,
            'content' => $request->content,
        ]);
        return redirect()->route('new.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $new = News::all()->where('id',$id);
        return view('admin/new/show',compact('new'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = DB::table('news')->where('id', $id)->first();
        return view('admin/new.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'required',
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề',
            'content.required'=>'Vui lòng nhập nội dung',
            'image.required'=>'Vui lòng nhập ảnh',
        ]);
          
        if($request->hasFile('image')) {
            $url = Storage::put('new', $request->file('image'));
        } else {
            $url = '';
        }

        DB::table('news')->where('id', $id)->update([
            'title' => $request->title,
            'image' => $url,
            'content' => $request->content,
        ]);
        return redirect()->route('new.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('news')->where('id', $id)->delete();
        return back();
    }
}
