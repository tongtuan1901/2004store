<?php

namespace App\Http\Controllers\Admin1;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW  = 'Admin1.banners.';
    public function index()
    {
        $listBanners = DB::table('banners')->where('deleted',0)->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact("listBanners"));
    }
    public function trash()
    {
        $listBanners = DB::table('banners')->where('deleted',1)->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact("listBanners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|regex:/^[\pL\s]+$/u|max:255',
            'content' => 'required|string|regex:/^[\pL\s]+$/u',
            'image' => 'required|image|max:2048'
        ], [
            'title.required' => 'Tieu de la bat buoc!',
            'title.regex' => 'Tieu de chi duoc chua cac ky tu chu va khoang trang!',
            'content.required' => 'Noi dung la bat buoc!',
            'image.image' => 'File tai len phai la mot hinh anh!',
            'image.required' => 'Anh la bat buoc!'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $validate['image'] = $imagePath;
        }

        Banners::query()->create($validate);
        return redirect()->route('admin-banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banners::findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ],[
            'title.required' => 'Tieu de la bat buoc!',
            'title.regex' => 'Tieu de chi duoc chua cac ky tu chu va khoang trang!',
            'content.required' => 'Noi dung la bat buoc!',
            'image.image' => 'File tai len phai la mot hinh anh!',
            'image.required' => 'Anh la bat buoc!'
        ]);

        $banner = Banners::findOrFail($id);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $imagePath = $request->file('image')->store('banners', 'public');
            $validated['image'] = $imagePath;
        }

        $banner->update($validated);
        return redirect()->route('admin-banners.index')->with('success', 'Cập nhật banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        
        $banner = Banners::findOrFail($id);
        $banner->deleted= true;
        $banner->save();

        return back();
    }
    public function destroy(string $id)
    {
        $banner = Banners::findOrFail($id);
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();
        return redirect()->route('admin-banners.index')->with('success', 'Xóa banner thành công');
    }
}
