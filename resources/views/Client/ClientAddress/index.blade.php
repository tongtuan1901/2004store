@extends('Client.layouts.paginate.master')
@section('contentClient')
    <div class="address-container">
        <h2>Danh sách địa chỉ của {{ $user->name }}</h2>
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($addresses->isEmpty())
            <p>Không có địa chỉ nào được lưu.</p>
        @else
            <ul>
                @foreach($addresses as $address)
                    <div class="address_li">
                        <span> Tên:{{ $address->name }}, Số điện thoại:{{ $address->phone_number }},Xã:{{ $address->street }}, Thành phố:{{ $address->city }}, Huyện{{ $address->state }},Địa chỉ nhà{{ $address->house_address }}</span>
                        <a href="{{ route('address.edit', ['id' => $address->id]) }}">
                            <svg width="16" height="16" fill="currentColor" class="icon icon-edit" viewBox="0 0 24 24">
                                <path d="M3 17.25V21h3.75l11.04-11.04-3.75-3.75L3 17.25zM20.71 7.04a1.004 1.004 0 0 0 0-1.42l-2.34-2.34a1.004 1.004 0 0 0-1.42 0L15.13 4.8l3.75 3.75 1.83-1.51z"/>
                            </svg>
                            Chỉnh sửa
                        </a>
                        <form action="{{ route('address.delete', ['id' => $address->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa địa chỉ này?')">
                                <svg width="16" height="16" fill="currentColor" class="icon icon-delete" viewBox="0 0 24 24">
                                    <path d="M3 6h18v2H3V6zm3 14h12c.55 0 1-.45 1-1V9H5v10c0 .55.45 1 1 1zm3-8h2v6H9v-6zm4 0h2v6h-2v-6z"/>
                                </svg>
                                Xóa
                            </button>
                        </form>
                    </div>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('address.create', ['userId' => $user->id]) }}" class="add-address">
            <svg width="16" height="16" fill="currentColor" class="icon icon-add" viewBox="0 0 24 24">
                <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"/>
            </svg>
            Thêm địa chỉ mới
        </a>
        <a class="ft2" href="{{ route('client-checkout.index') }}" title="Thanh toán">Thanh toán</a>
    </div>

    <style>
        .address-container {
    max-width: 600px;
    margin: 20px auto;
    text-align: left;
    padding: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.address-container h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.alert {
    background-color: #e2f3e4;
    color: #256029;
    padding: 12px;
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: center;
}

ul {
    list-style-type: none;
    padding: 0;
}

.address_li {
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.address_li:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.address_li span {
    color: #555;
    line-height: 1.6;
}

.add-address {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    padding: 12px 20px;
    border-radius: 8px;
    text-decoration: none;
    margin-top: 20px;
    transition: background-color 0.3s;
}

.add-address:hover {
    background-color: #218838;
}

button {
    border: none;
    background: transparent;
    cursor: pointer;
    font-size: inherit;
    padding: 0 8px;
}

.icon-delete {
    color: #dc3545;
    transition: color 0.2s;
}

.icon-delete:hover {
    color: #b02a37;
}

.icon-edit {
    color: #007bff;
    transition: color 0.2s;
}

.icon-edit:hover {
    color: #0056b3;
}

button:hover {
    opacity: 0.8;
}


    </style>
@endsection
