<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminYeuCauRutTien;

class AdminYeuCauRutTienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listYeuCauRutTien()
    {
        $layYeuCauNew = AdminYeuCauRutTien::orderBy('created_at', 'desc')->get();
        // dd($layYeuCauNew);
        return view('Admin.transfer-requests.khRutTien',compact('layYeuCauNew'));
    }
    public function updateIsApproved(Request $request, $id)
    {
        $yeuCau = AdminYeuCauRutTien::find($id);

    if ($yeuCau) {
        $yeuCau->is_approved = $request->input('is_approved');
        $yeuCau->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
    }
    return redirect()->back()->with('error', 'Không tìm thấy yêu cầu!');
    }
    public function filterRequests(Request $request)
{
    $filter = $request->input('filter');

    if ($filter == '1') {
        $layYeuCauNew = AdminYeuCauRutTien::where('is_approved', 1)->get();
    } elseif ($filter == '0') {
        $layYeuCauNew = AdminYeuCauRutTien::where('is_approved', 0)->get();
    } else {
        $layYeuCauNew = AdminYeuCauRutTien::all();
    }

    return view('Admin.transfer-requests.khRutTien', compact('layYeuCauNew'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
