@extends('layout')

@section('content')
    <h1>Categories</h1>

    <div class="filter-section">
        <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
            @csrf

            @if (isset($category))
                @method('PUT') <!-- Use PUT method for updates -->
            @endif

            <input type="text" id="name" name="name" placeholder="Category Name (*)" class="search-bar" value="{{ isset($category) ? $category->name : '' }}" required>
            <input type="text" id="description" name="description" placeholder="Category Description" class="search-bar" value="{{ isset($category) ? $category->description : '' }}">
            <button class="btn btn-search">{{ isset($category) ? 'Update' : 'Create' }}</button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="bookmark-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="bookmark-list">
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
