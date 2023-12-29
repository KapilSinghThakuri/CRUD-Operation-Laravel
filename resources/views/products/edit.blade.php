@extends('layout.app')

@section('main')

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <div class="card mt-3 p-3">

            <h1>Product Edit {{ $product->name }}</h1>
              <form method="POST" action="/products/{{ $product->id}}/update"
               enctype="multipart/form-data"><!--ecntype do submit the file with its proper string format-->
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" 
                  value="{{ old ('name', $product->name)}}"> 

                  @if($errors->has('name')) <!--it provides the error (with the help of validaations method)-->
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control">{{old ('description', $product->description)}}</textarea>

                  @if($errors->has('description')) <!--it provides the error (with the help of validaations method)-->
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif

                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" class="form-control">

                  @if($errors->has('image')) <!--it provides the error (with the help of validaations method)-->
                  <span class="text-danger">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <button type="submit" class="btn btn-dark">Submit</button>

              </form>

            </div>

          </div>
        </div>
    </div>

@endsection