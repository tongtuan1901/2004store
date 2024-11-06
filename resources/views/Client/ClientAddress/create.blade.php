@extends('Client.layouts.paginate.master')
@section('contentClient')
<h2 class="form-title">Thêm Địa Chỉ Mới</h2>
<form action="{{ route('address.store', ['userId' => $user->id]) }}" method="POST" class="address-form">
    @csrf
    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" id="name" name="name" required>
    </div>
    
    <div class="form-group">
        <label for="state">Số điện thoại</label>
        <input type="text" id="phone_number" name="phone_number" required>
    </div>
    <div class="form-group">
        <label for="street">Xã</label>
        <input type="text" id="street" name="street" required>
    </div>
    
    <div class="form-group">
        <label for="city">Thành phố/ Tỉnh</label>
        <input type="text" id="city" name="city" required>
    </div>
    
    <div class="form-group">
        <label for="state">Huyện</label>
        <input type="text" id="state" name="state" required>
    </div>
    
    <button type="submit" class="submit-button">Thêm Địa Chỉ</button>
</form>
<style>
    .address-form {
    max-width: 400px; 
    margin: 20px auto;
    padding: 20px; 
    border: 1px solid #ccc; 
    border-radius: 8px; 
    background-color: #f9f9f9; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block; 
    margin-bottom: 5px; 
    font-weight: bold;
}

input[type="text"] {
    width: 100%; 
    padding: 10px; 
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.submit-button {
    background-color: deepskyblue; 
    color: white;
    padding: 10px 15px;
    border: none; 
    border-radius: 4px; 
    cursor: pointer; 
    font-size: 16px; 
    transition: background-color 0.3s; 
}

.submit-button:hover {
    background-color: #007bff;
}
.form-title {
    text-align: center; 
    margin-bottom: 20px; 
    font-size: 24px; 
    font-weight: bold; 
    color: #333;
}

</style>

@endsection