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
    <div class="container mt-3 " id="editProd">
        <h1 class="px-4">Edit Product</h1>
        <div class="row bg-secondary rounded-3">
            <div class="col-12">
                <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" class="p-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required maxlength="150" minlength="3" value="{{ old('name', $product->name) }}"   >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">* Minimum 3 characters and maximum 150 characters</div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}
                        </textarea>
                    </div>

                    <div>
                        {{-- image n preview --}}


                        <div class="row pb-3 imgNselect">
                            <div class="col-6" >
                                <div class="d-flex flex-column">
                                    <div class="pb-3">
                                        <label for="cover_image" class="form-label">Insert an Image</label>
                                            <input type="file" name="cover_image" id="cover_image"
                                                class="form-control  @error('cover_image') is-invalid @enderror">
                                            @error('cover_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="media text-center">
                                            <img id="uploadPreview" src="{{ asset('storage/' . $product->cover_image) }}"
                                            alt="{{ $product->name }}">                                      
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-6 d-flex flex-column justify-content-between"> 
                                
                                {{-- select type  --}}
                                
                                <div class="">
                                    <label for="type_id" class="form-label">Select Type</label>
                                    <select name="type_id" id="type_id"
                                        class="form-control @error('type_id') is-invalid @enderror" required>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ $type->id == old('type_id', $product->type_id) ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                {{-- select brand --}}
                                
                                <div class="">
                                    <label for="brand_id" class="form-label">Select Brand</label>
                                    <select name="brand_id" id="brand_id"
                                        class="form-control @error('brand_id') is-invalid @enderror" required>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id', $product->brand_id) ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                {{-- select texture --}}
                                
                                <div class="">
                                    <label for="texture_id" class="form-label">Select Texture</label>
                                    <select name="texture_id" id="texture_id"
                                        class="form-control @error('texture_id') is-invalid @enderror" required>

                                        @foreach ($textures as $texture)
                                            <option value="{{ $texture->id }}" {{ $texture->id == old('texture_id', $product->texture_id) ? 'selected' : '' }}>
                                                {{ $texture->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('texture_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="">
                                    <label class="form-check-label d-block" for="price">Price</label>
                                    {{-- price input --}}
                                    <div class="d-flex gap-1">
                                        <div class="">
                                        
                                            <input placeholder="price" id="price" name="price" type=number class="form-control" step=0.01 min="0" value="{{$product->price}}"/>
                                        </div>
                                        {{-- seleziona valuta (currenty) --}}
                                        <div class=" ">
                                            <select name="price_sign" id="price_sign"
                                                class="form-control text-center @error('price_sign') is-invalid @enderror" required>
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
                        </div>  
                        

                        {{-- ------------------colori-------------- --}}

                         <div class="mb-3 container-fluid">
                             <label for="color" class="form-label">Select Color</label> <br>
                            {{-- @foreach ($colors as $color) --}}
                                <div class=" row row-cols-4">
                                        @foreach ($colors as $color)
                                            <div class="col form-check form-switch">
                                                <input class="form-check-input rounded-pill" type="checkbox" id="color-{{$color->id}}"  name="colors[]" value="{{$color->id}}" @foreach($product->colors as $prod_color){{{$prod_color->id == $color->id ? 'checked' : ''}}}@endforeach>
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

@endsection
