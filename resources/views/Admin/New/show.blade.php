@extends('Admin/layouts/master/master')
@section('content')
    @foreach ($new as $item)
    <div class="container mx-auto p-4 text-center">
        <h1 class="text-4xl font-bold mb-4">{{$item->title}}</h1>
        
        <div class="mb-4">
            <img src="{{Storage::url($item->image)}}" alt="" class="w-48 h-48 object-cover rounded-lg mx-auto">
        </div>
        
        <p class="text-base leading-relaxed text-gray-700 mb-6">{{$item->content}}</p>
        
        <button class="inline-block bg-brand-500 text-white hover:bg-brand-600 mt-1 text-md font-medium py-2 px-4 rounded focus:outline-none">
            <a href="{{route('new.index')}}" class="text-white hover:text-white">Quay lại</a>
        </button>
    </div>
    
    
    @endforeach
@endsection