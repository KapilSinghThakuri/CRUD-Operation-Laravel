@extends('layout.app')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <div class="card-header">
                    <h4> Products Details
                        <a href="{{ url('/home') }}" class=" btn btn-primary float-right">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <p>Product's Name: <b> {{ $product->name }}</b></p>
                    <p>Description: <b> {{ $product->description }}</b></p>
                    <img src="/products/{{ $product->image }}" class="rounded" width="100%" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection