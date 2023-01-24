@extends('layouts.app')

@section('content')
    <section class="my-5" id="indexProduct">
        <div class="container post-list">
            @if(session()->has('message'))
                <div class="alert alert-success text-primary mb-3 mt-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row my-3 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product list:</h4>
                        </div>
                        <div class="card-body">
                            <ul class="container-fluid">
                                @foreach ($products as $product)
                                    <li class="row row-cols-2 my-1">
                                        <a href="{{route('admin.products.show', $product->slug)}}" title="View product" class="col-10">
                                            {{$product->id}} {{$product->name}} <span class="text-capitalize brand" title="Brand: {{$product->brand->name}}">{{$product->brand->name}}</span>
                                            <sub class="text-capitalize">
                                                @if ($product->type_id)
                                                    <span title="Type">{{$product->type->name}}</span>
                                                @endif
                                                @if ($product->texture_id)
                                                    <span title="Texture">{{$product->texture->name}}</span>
                                                @endif
                                            </sub>
                                            
                                        </a> 

                                        {{-- edit part --}}
                                        <div class="edit col-2 row row-cols-2">
                                            <a href="#" class="btn btn-primary col-auto"><i class="fa-solid fa-pencil"></i></a>
                                            <form action="" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-secondary my-delete" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                            </form>
                                        </div> 
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
