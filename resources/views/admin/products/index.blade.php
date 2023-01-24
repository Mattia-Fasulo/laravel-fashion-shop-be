@extends('layouts.test')
@section('content')
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} <img src="{{ asset('storage/' . $product->cover_image) }}" alt="" width="100" height="100"></li>
        @endforeach
    </ul>
@endsection
