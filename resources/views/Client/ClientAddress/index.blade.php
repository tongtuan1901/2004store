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
                    <li>
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
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('address.create', ['userId' => $user->id]) }}" class="add-address">
            <svg width="16" height="16" fill="currentColor" class="icon icon-add" viewBox="0 0 24 24">
                <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"/>
            </svg>
            Thêm địa chỉ mới
        </a>
    </div>

    <style>
        .address-container {
            text-align: center;
            margin: 20px; 
        }

        .address-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .alert {
            background-color: #d4edda; 
            color: #155724; 
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between; 
            align-items: center;
        }

        .add-address {
            display: inline-block;
            background-color: #28a745; 
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .add-address:hover {
            background-color: #218838; 
        }
        button {
        border: none; 
        background: transparent; 
        cursor: pointer; 
        font-size: inherit; 
        }

        .icon-delete {
            color: red; 
        }

        .icon-edit {
            color: deepskyblue; 
        }

        button:hover {
            opacity: 0.7; 
        }

    </style>
@endsection
