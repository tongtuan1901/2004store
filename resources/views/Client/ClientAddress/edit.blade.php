@extends('Client.layouts.paginate.master')

@section('contentClient')
    <h2 class="form-title">Chỉnh Sửa Địa Chỉ</h2>
    
    <form action="{{ route('address.update', ['id' => $address->id]) }}" method="POST" class="address-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" id="name" name="name" value="{{ old('name', $address->name) }}" required>
            @if ($errors->has('name'))
            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="state">Số điện thoại</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $address->phone_number) }}" required>
        </div>
        <div class="form-group">
            <label for="street">Xã</label>
            <input type="text" id="street" name="street" value="{{ old('street', $address->street) }}" required>
            @if ($errors->has('street'))
                <div class="alert alert-danger">{{ $errors->first('street') }}</div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="city">Thành phố/ Tỉnh</label>
            <input type="text" id="city" name="city" value="{{ old('city', $address->city) }}" required>
            @if ($errors->has('city'))
                <div class="alert alert-danger">{{ $errors->first('city') }}</div>
            @endif
        </div>
        
        <div class="form-group">
    <label for="house_address">Địa chỉ nhà</label>
    <input type="text" id="house_address" name="house_address" value="{{ old('house_address', $address->house_address) }}" required>
    @if ($errors->has('house_address'))
        <div class="alert alert-danger">{{ $errors->first('house_address') }}</div>
    @endif
</div>
    
        <button type="submit" class="submit-button">Cập Nhật Địa Chỉ</button>
    </form>
@endsection
