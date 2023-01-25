@extends('layouts.test')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
        @if (session()->get('success'))
        <div id="login-message" class="d-inline-block" onclick="close(this.classList.add('d-none')); remove(this.classList.remove('d-inline-block')) ">
            
                    <div class="bg-text-secondary py-2 text-" role="alert">
                        {{session()->get('success')}} 
                        <span id="close" class="bg-danger rounded p-2" style="cursor: pointer;" ><i class="fas fa-times"></i>
                        </span>
                    </div>
        </div>
        @endif
        </div>
    </div>
</div>

@endsection
