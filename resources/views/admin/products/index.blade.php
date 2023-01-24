@extends('layouts.test')
@section('content')
    <section>
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
                                    <li class="row row-cols-2">
                                        <a href="#" title="View product" class="col-10">
                                            {{$product->id}} {{$product->name}} <span class="text-capitalize">{{$product->brand->name}}</span>
                                            @if ($product->type_id)
                                                <sub ><span title="Type">{{$product->type->name}}</span></sub>
                                            @endif
                                        </a> 

                                        {{-- edit part --}}
                                        <div class="edit col-2 row row-cols-2">
                                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
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
