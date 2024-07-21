@extends('layouts.dashboard')

@section('content')
    <div class="m-5 ">
        <a class="btn btn-small btn-outline-primary" href="{{ route('dashboard.products.create') }}">New product</a>
    </div>
    <table class="table m-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Image</th>
            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><a href="{{ route('dashboard.products.show',$product->id) }}"> {{ $product->name }}</a></td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/products-image/' . $product->image) }}" alt="Product Image" style="max-width: 100px;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('dashboard.products.destroy',$product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info" href="{{ route('dashboard.products.show', $product->id) }}">Show</a>
                        @if(\App\Policycheck::pv('supervisor') || (\App\Policycheck::pv('editor') && $product->added_by == Session::get('userId')))
                            <a class="btn btn-primary" href="{{ route('dashboard.products.edit', $product->id) }}">Edit</a>
                        @endif
                        @if(\App\Policycheck::pv('admin'))
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                    @if(\App\Policycheck::pv('supervisor'))
                        <a class="btn {{ $product->needReview ? " btn-primary" :" btn-danger" }}" href="{{ route('dashboard.users.publish', $product->id) }}">publish</a>
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
