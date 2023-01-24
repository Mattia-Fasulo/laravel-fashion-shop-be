@extends('layouts.app')

@section('content')
    <section class="my-5" id=showProduct>
        <div class="container">
            <div class="card">
                <div class="card-header d-flex align-items-baseline justify-content-between">
                    <h1>{{$product->name}}</h1>
                    <div class="info d-flex">
                        <sub class="text-capitalize">
                            @if ($product->type_id)
                                <span title="Type">{{$product->type->name}}</span>
                            @endif
                            @if ($product->texture_id)
                                <span title="Texture">{{$product->texture->name}}</span>
                            @endif
                        </sub>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="product-body row">
                        <div class="body-text {{$product->cover_image ? 'col-4': 'col-12'}}">
                            <div>{{$product->description}}</div>
                            <div class="price">
                                <h3>{{$product->price}}{{$product->price_sign}}</h3>
                            </div>
                            <div class="productPalette w-25 d-flex justify-content-around">
                                @foreach ($product->colors as $color)
                                    <div title="{{$color->name }}"><i class="fa-solid fa-circle" style="color: {{$color->hex_value }}"></i></div>
                                @endforeach
                                
                            </div>
                        </div>
                        @if ($product->cover_image)
                            <div class="body-image col-4 offset-4"><img class="w-100" src="{{asset('storage/'.$product->cover_image)}}" alt=""></div>
                        @endif

                        
                    </div>
                </div>
            </div>
            <a href="{{route('admin.products.index')}}" class="btn btn-primary my-3">Show all Products</a>
        </div>
    </section>
@endsection