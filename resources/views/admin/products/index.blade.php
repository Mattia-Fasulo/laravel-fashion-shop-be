@extends('layouts.test')
@section('content')
    <section id="indexProduct">

        <div class="container-fluid px-4 bg-dark rounded">

            <div class="row my-3 justify-content-center">

                <div class="col-12">


                    @if (session()->has('message'))
                        <div class="alert alert-success mx-2 mb-3">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    {{-- inizio tabella nuova --}}

                    <div class="table-responsive bg-secondary p-3 rounded">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <h4 class="py-3">Product list:</h4>
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Controls</th>
                                        <th scope="col">Texture</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        {{-- old --}}
                                        {{-- <a href="{{route('admin.products.show', $product->slug)}}" title="View product" class="col-10">
                                            {{$product->id}} {{$product->name}} <span class="text-capitalize brand" title="Brand: {{$product->brand->name}}">{{$product->brand->name}}</span> --}}

                                        {{-- @if ($product->type_id && $product->texture_id)
                                                    <sub class="text-capitalize"> --}}

                                        {{-- ????? --}}

                                        {{-- <span title="Type {{Str::lower($product->type->name) == $product->texture->name ? '& Texture' : ''}}">{{$product->type->name}}</span> --}}

                                        {{-- end ????? --}}

                                        {{-- @if (Str::lower($product->type->name) != $product->texture->name)
                                                            <span title="Texture">{{$product->texture->name}}</span>
                                                        @endif
                                                    </sub>
                                                @endif

                                        </a>  --}}
                                        {{-- nuova riga tabella --}}

                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><span class="text-capitalize brand"
                                                title="Brand: {{ $product->brand->name }}">{{ $product->brand->name }}</span>
                                        </td>
                                        <td><span title="Texture">{{ $product->texture->name ?? '' }}</span></td>
                                        <td><span title="Texture">{{ $product->type->name ?? '' }}</span></td>
                                        <td><a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.products.show', $product->slug) }}">Detail</a></td>
                                        <td class="d-flex gap-3 justify-content-center">
                                            <a href="{{ route('admin.products.edit', ['product' => $product->slug]) }}"
                                                class="btn btn-dark"><i class="fas fa-pencil-alt"></i></a>
                                            <div class="edit">
                                                <form
                                                    action="{{ route('admin.products.destroy', ['product' => $product->slug]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary my-delete" type="submit"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{-- fine tabella --}}



                        {{-- <div class="card-body">
                            <ul class="container-fluid">
                                @foreach ($products as $product)
                                    <li class="row row-cols-2 my-1">
                                        <a href="{{route('admin.products.show', $product->slug)}}" title="View product" class="col-10">
                                            {{$product->id}} {{$product->name}} <span class="text-capitalize brand" title="Brand: {{$product->brand->name}}">{{$product->brand->name}}</span>

                                                @if ($product->type_id && $product->texture_id)
                                                    <sub class="text-capitalize">
                                                        <span title="Type {{Str::lower($product->type->name) == $product->texture->name ? '& Texture' : ''}}">{{$product->type->name}}</span>

                                                        @if (Str::lower($product->type->name) != $product->texture->name)
                                                            <span title="Texture">{{$product->texture->name}}</span>
                                                        @endif
                                                    </sub>
                                                @endif

                                        </a>

                                        {{-- edit part --}}
                                        <div class="edit col-2 row row-cols-2">
                                            <a href="{{route('admin.products.edit', ['product' => $product->slug ])}}" class="btn btn-primary col-auto"><i class="fa-solid fa-pencil"></i></a>
                                            <form action="{{route('admin.products.destroy',['product'=>$product->slug])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-secondary my-delete" type="submit"><i
                                                        class="fa-regular fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                        @include('partials.modal-delete')
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                </div>
            </div>
        </div>
    </section>
@endsection
