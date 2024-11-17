@extends('Client.layouts.paginate.master')

@section('contentClient')
    <div class="container my-5">
        <h2 class="text-center mb-4">Chỉnh Sửa Địa Chỉ</h2>
        
        <form action="{{ route('address.update', ['id' => $address->id]) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $address->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="phone_number" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $address->phone_number) }}" required>
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="street" class="form-label">Xã</label>
                <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" value="{{ old('street', $address->street) }}" required>
                @error('street')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="city" class="form-label">Thành phố/ Tỉnh</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $address->city) }}" required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="house_address" class="form-label">Địa chỉ nhà</label>
                <input type="text" class="form-control @error('house_address') is-invalid @enderror" id="house_address" name="house_address" value="{{ old('house_address', $address->house_address) }}" required>
                @error('house_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Cập Nhật Địa Chỉ</button>
        </form>
    </div>
@endsection
