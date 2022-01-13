@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach( $products as $product )
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td><img width="50px" height="50px" src="/storage/{{ $product->image }}"/></td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
@endsection
