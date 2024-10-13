@extends('Admin/layouts/master/master')
@section('content')
    @foreach ($new as $item)
        <div class="container">
            <h1 class="text-4xl">{{$item->title}}</h1>
            <div>
                <img src="{{Storage::url($item->imge)}}" alt="">
            </div>
            <p class="">{{$item->content}}</p>
            <button
                class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white  text-md font-medium py-2 px-4 rounded">
                        <a href="{{route('new.index')}}">Quay lai</a>
            </button>
        </div>
    @endforeach
@endsection