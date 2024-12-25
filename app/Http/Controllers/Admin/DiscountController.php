<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function applyDiscount(Request $request)
    {
        // Lấy mã giảm giá từ request
        $discountCode = $request->input('discount_code');

        // Tìm mã giảm giá trong database
        $discount = Discount::where('code', $discountCode)->first();

        if (!$discount) {
            return back()->withErrors(['error' => 'Mã giảm giá không hợp lệ.']);
        }

        // Kiểm tra xem mã có hợp lệ hay không
        if (!$discount->isValid()) {
            return back()->withErrors(['error' => 'Mã giảm giá đã hết hạn hoặc vượt quá số lần sử dụng.']);
        }

        $total = session()->get('cart_total', 0);

        // Tính giá trị giảm
        if ($discount->type === 'fixed') {
            // Giảm giá cố định
            $dis = $discount->value;
        } elseif ($discount->type === 'percent') {
            // Giảm giá theo phần trăm
            $dis = $total * ($discount->value / 100);
        }

        // Đảm bảo rằng giảm giá không vượt quá tổng số tiền của đơn hàng
        $dis = min($dis, $total);

        // Tính tổng sau khi áp dụng giảm giá
        $newTotal = $total - $dis;

        // Lưu thông tin mã giảm giá và tổng tiền sau khi giảm vào session
        session([
            'discount' => $discountCode,
            'dis' => $dis,
            'new_total' => $newTotal
        ]);


        return back()->with('success', 'Mã giảm giá đã được áp dụng!');
    }

    // Xóa mã giảm giá
    public function removeDiscount()
    {
        session()->forget(['discount', 'dis', 'new_total']);
        return back()->with('success', 'Mã giảm giá đã được xóa.');
    }

    // Hiển thị danh sách mã giảm giá
    public function index(Request $request)
{
    // Lấy dữ liệu từ request
    $validFrom = $request->input('valid_from');
    $validTo = $request->input('valid_to');

    // Khởi tạo query builder
    $query = Discount::query();

    // Áp dụng điều kiện lọc nếu có ngày bắt đầu
    if (!empty($validFrom)) {
        $query->where('valid_from', '>=', $validFrom);
    }

    // Áp dụng điều kiện lọc nếu có ngày kết thúc
    if (!empty($validTo)) {
        $query->where('valid_to', '<=', $validTo);
    }

    // Lấy danh sách mã giảm giá sau khi áp dụng các điều kiện
    $discounts = $query->get();

    // Trả về view kèm dữ liệu
    return view('Admin.Discounts.index', compact('discounts', 'validFrom', 'validTo'));
}
    // Hiển thị form tạo mã giảm giá
    public function create()
    {
        return view('Admin.Discounts.create');
    }

    // Lưu mã giảm giá mới
    public function store(Request $request)
    {   
        $request->validate([
            'code' => 'required|unique:Discounts|max:255',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_usage' => 'nullable|integer|min:0',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ], [
            'code.required' => 'Mã giảm giá là bắt buộc.',
            'code.unique' => 'Mã giảm giá đã tồn tại.',
            'type.required' => 'Loại giảm giá là bắt buộc.',
            'type.in' => 'Loại giảm giá không hợp lệ.',
            'value.required' => 'Giá trị giảm giá là bắt buộc.',
            'value.numeric' => 'Giá trị giảm giá phải là số.',
            'value.min' => 'Giá trị giảm giá phải lớn hơn hoặc bằng 0.',
            'min_order_value.numeric' => 'Giá trị đơn hàng tối thiểu phải là số.',
            'min_order_value.min' => 'Giá trị đơn hàng tối thiểu phải lớn hơn hoặc bằng 0.',
            'max_usage.integer' => 'Số lần sử dụng tối đa phải là số nguyên.',
            'max_usage.min' => 'Số lần sử dụng tối đa phải lớn hơn hoặc bằng 0.',
            'valid_from.required' => 'Ngày bắt đầu là bắt buộc.',
            'valid_from.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',
            'valid_to.required' => 'Ngày kết thúc là bắt buộc.',
            'valid_to.date' => 'Ngày kết thúc phải là một ngày hợp lệ.',
            'valid_to.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ]);
        
        // Kiểm tra nếu loại giảm giá là phần trăm và giá trị giảm vượt quá 100%
        if ($request->input('type') === 'percent' && $request->input('value') > 100) {
            return redirect()->back()->withErrors([
                'value' => 'Giá trị giảm giá phần trăm không thể vượt quá 100%.'
            ]);
        }

    // Kiểm tra nếu ngày bắt đầu lớn hơn ngày kết thúc
    $validFrom = $request->input('valid_from');
    $validTo = $request->input('valid_to');

    if ($validFrom >= $validTo) {
        return redirect()->back()->withErrors([
            'valid_to' => 'Ngày kết thúc phải lớn hơn ngày bắt đầu.'
        ]);
    }
        

        Discount::create($request->all());

        return redirect()->route('discount.index')->with('success', 'Mã giảm giá đã được tạo thành công.');
    }

    // Hiển thị form chỉnh sửa mã giảm giá
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('Admin.Discounts.edit', compact('discount'));
    }

    public function update(Request $request, $id)
    {
        // Validate các trường dữ liệu
        $request->validate([
            'code' => 'required|max:255|unique:Discounts,code,' . $id,
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'min_order_value' => 'nullable|numeric|min:0',
            'max_usage' => 'nullable|integer|min:0',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
        ], [
            'code.required' => 'Mã giảm giá là bắt buộc.',
            'code.unique' => 'Mã giảm giá đã tồn tại.',
            'value.required' => 'Giá trị giảm giá là bắt buộc.',
            'value.numeric' => 'Giá trị giảm giá phải là số.',
            'value.min' => 'Giá trị giảm giá không được âm.',
            'min_order_value.numeric' => 'Giá trị đơn hàng tối thiểu phải là số.',
            'min_order_value.min' => 'Giá trị đơn hàng tối thiểu không được âm.',
            'max_usage.integer' => 'Số lần sử dụng tối đa phải là số nguyên.',
            'max_usage.min' => 'Số lần sử dụng tối đa không được âm.',
            'valid_from.required' => 'Ngày bắt đầu là bắt buộc.',
            'valid_from.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',
            'valid_to.required' => 'Ngày kết thúc là bắt buộc.',
            'valid_to.date' => 'Ngày kết thúc phải là một ngày hợp lệ.',
            'valid_to.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ]);
        
        // Kiểm tra nếu loại giảm giá là phần trăm và giá trị giảm vượt quá 100%
        if ($request->input('type') === 'percent' && $request->input('value') > 100) {
            return redirect()->back()->withErrors([
                'value' => 'Giá trị giảm giá phần trăm không thể vượt quá 100%.'
            ]);
        }

        // Tìm và cập nhật giảm giá
        $discount = Discount::findOrFail($id);
        $discount->update($request->all());

        return redirect()->route('discount.index')->with('success', 'Mã giảm giá đã được cập nhật thành công.');
    }
    // Xóa mã giảm giá
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('discount.index')->with('success', 'Mã giảm giá đã được xóa thành công.');
    }
}
