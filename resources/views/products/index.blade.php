@extends('layout.app')

@section('main')

<div class="container">
    <div class="text-right">
      <a href="products/create" class="btn btn-dark mt-2">New Product</a>
    </div>
    
    <table class="table table-hover mt-2">
        <thead>
          <tr>
            <th>Sno.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>

            <td><a href="products/ {{ $product->id }}/show" class="text-dark">
              {{ $product->name }}</a></td>

            <td>
              <img src="{{ asset('products/' . $product->image) }}" class="rounded-circle"
               width="50" height="50">
            </td>
            <!--FOR EDITING-->
            <td>
              <a href=" products/{{ $product->id }}/edit" class="btn btn-sm btn-dark">
                Edit
              </a>

             <!--(THIS IS GET METHOD TO DELETE THE DATA) -->
               <a href=" products/{{ $product->id }}/delete" class="btn btn-sm btn-danger">
                Delete
              </a>

              <!--  (DELETE METHOD FOR DELETING DATA)
              <form mehtod="POST" class="d-inline" action="products/{{ $product->id }}/delete">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form>   -->

            </td>
          </tr>
          @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
    
</div>

@endsection