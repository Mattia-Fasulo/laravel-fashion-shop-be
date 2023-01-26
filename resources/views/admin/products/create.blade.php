@extends('layouts.test')



@section('content')

    {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
        
    <div class="container mt-3 bg-dark " id="createProd">
        <h1 class="px-4">Create Product</h1>
        <div class="row bg-secondary rounded-3">
            <div class="col-12">
                <div class="p-4" >
                
                
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                {{-- input nome prodotto  --}}

                <div id="input-name" class="mb-3">
                    <label for="name" class="form-label">Nome del Prodotto</label>
                    <input type="text" class="form-control w-25  @error('name') is-invalid @enderror" id="name" name="name" required maxlength="150" minlength="3">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">* Minimum 3 characters and maximum 150 characters</div>
                </div>
                
                <div id="description" class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="10" ></textarea>
                </div>

                
                {{-- input immagine con preview  --}}
                
                <div class="row pb-3">
                    <div class="col-4" >
                        <div class="d-flex flex-column">
                            <label for="cover_image" class="form-label">Insert an Image</label>
                            <div class="mb-3">
                                    <input type="file" name="cover_image" id="cover_image"
                                        class="form-control  @error('cover_image') is-invalid @enderror">
                                    @error('cover_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="media py-2 w-100 ">
                                <img id="uploadPreview" class="shadow rounded-3" src="https://via.placeholder.com/600x400">
                            </div>
                        </div>
                    </div>

                    <div class="col-4 "> 
                        
                        {{-- select type  --}}
                        
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Select Type</label>
                            <select name="type_id" id="type_id"
                                class="form-control @error('type_id') is-invalid @enderror" required>
                                <option value="">Select type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- select brand --}}
                        
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Select Brand</label>
                            <select name="brand_id" id="brand_id"
                                class="form-control @error('brand_id') is-invalid @enderror" required>
                                <option value="">Select brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- select texture --}}
                        
                        <div class="mb-3">
                            <label for="texture_id" class="form-label">Select Texture</label>
                            <select name="texture_id" id="texture_id"
                                class="form-control @error('texture_id') is-invalid @enderror" required>
                                <option value="">Select texture</option>
                                @foreach ($textures as $texture)
                                    <option value="{{ $texture->id }}">
                                        {{ $texture->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('texture_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="d-flex gap-1">
                        {{-- price input --}}
                        <div class="mb-3">
                            {{-- <label class="form-check-label d-block" for="price">Price</label> --}}
                            <input placeholder="price" id="price" name="price" type=number class="form-control" step=0.01 min="0"/>
                        </div>

                        {{-- seleziona valuta (currenty) --}}
                        <div class="mb-3 ">

                            <select name="price_sign" id="price_sign"
                                class="form-control text-center @error('price_sign') is-invalid @enderror" required>
                                <option value="">Val</option>

                                <option value="$" > $ </option>
                                <option value="£"> £ </option>
                                <option value="€" selected> € </option>

                            </select>
                            @error('price_sign')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>  
                        {{-- ------------------colori-------------- --}}
                <div class="mb-3 container-fluid">
                    <label for="color" class="form-label">Select Color</label> <br>
                   {{-- @foreach ($colors as $color) --}}
                       <div class=" row row-cols-4">
                               @foreach ($colors as $color)
                                   <div class="col form-check form-switch">
                                       <input class="form-check-input rounded-pill" type="checkbox" id="color-{{$color->id}}"  name="colors[]" value="{{$color->id}}">
                                       <label class="form-check-label" for="color-{{$color->id}}">{{$color->name}} <i class="fas fa-circle" style="color: {{$color->hex_value }}"></i></label>
                                   
                                   
                                   </div>
                               @endforeach
                       </div>
                            {{-- @endforeach --}}
                            @error('color')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <button type="reset" class="btn btn-light border-dark">Reset</button>
                </form>
                    
                
            </div>
        </div>
    </div>
    </div>
@endsection
