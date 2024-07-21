@extends('layouts.dashboard')

@section('content')
    <div class="m-5 ">
        <a class="btn btn-small btn-outline-primary" href="{{ route('dashboard.categories.create') }}">New Category</a>
    </div>
    <table class="table m-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Active</th>
            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $category->id }}</td>
                <td><a href="{{ route('dashboard.categories.show',$category->id) }}"> {{ $category->name }}</a></td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->isActive }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('dashboard.categories.edit' , $category->id) }}" class="btn btn-sm btn-outline-success" >Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.categories.destroy' , $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>

                </td>
            </tr>
        </tbody>
    </table>

@endsection
