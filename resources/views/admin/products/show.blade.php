@extends('layouts.test')

@section('content')
    <section id=showProduct>
        <div class="container mt-3 ">
            <div class="card bg-secondary">
                <div class="card-header d-flex align-items-baseline justify-content-between border-3">
                    <h1>{{ $product->name }}</h1>


                </div>
                <div class="card-body">
                    <div class="product-body row">
                        <div class="body-text {{ $product->cover_image ? 'col-7' : 'col-12' }}">
                            <div class="my-2">
                                @if ($product->type_id)
                                    <span title="Type"><strong class="fs-4">Type:</strong>
                                        {{ $product->type->name }}</span>
                                @endif
                            </div>
                            <div class="my-2">
                                @if ($product->texture_id)
                                    <span title="Texture" class="text-capitalize"><strong class="fs-4">Texture:</strong>
                                        {{ $product->texture->name }}</span>
                                @endif
                            </div>
                            <div class="my-2">
                                @if ($product->brand_id)
                                    <span title="Brand" class="text-capitalize"><strong class="fs-4">Brand:</strong>
                                        {{ $product->brand->name }}</span>
                                @endif
                            </div>
                            <div class="my-2 d-flex">
                                <strong class="fs-4">Description:</strong>
                                <div class="m-2">{{ $product->description }}</div>
                            </div>
                            <div class="my-2 price">
                                <strong class="fs-4">Price:</strong>
                                <span class="fs-3">{{ $product->price }} {{ $product->price_sign }}</span>
                            </div>
                            <div class="my-2 d-flex">
                                <strong class="fs-4">Colors:</strong>
                                <div class="productPalette w-25 d-flex justify-content-around mx-2">

                                    @foreach ($product->colors as $color)
                                        <div class="d-flex align-items-center color-circle" title="{{ $color->name }}">
                                            <i class="fas fa-circle" style="color: {{ $color->hex_value }}"></i>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        @if ($product->cover_image)
                            <div class="body-image col-4 offset-1"><img class="w-100"
                                    src="{{ asset('storage/' . $product->cover_image) }}" alt=""></div>
                        @endif
                        <div class="edit d-flex justify-content-end my-2">
                            <a href="{{ route('admin.products.edit', ['product' => $product->slug]) }}"
                                class="btn btn-dark col-auto mx-2"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.products.destroy', ['product' => $product->slug]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary my-delete" type="submit"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary my-3">Show all Products</a>
            @include('partials.modal-delete')
        </div>
    </section>
@endsection
