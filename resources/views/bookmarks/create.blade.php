@extends('layout')

@section('content')
    <h1>{{ isset($bookmark) ? 'Edit Bookmark' : 'Add Bookmark' }}</h1>

    <div class="form-section">
        <form action="{{ isset($bookmark) ? route('urls.update', $bookmark->id) : route('urls.store') }}" method="POST">
            @csrf

            @if (isset($bookmark))
                @method('PUT')
            @endif

            <!-- URL Input -->
            <div class="form-group">
                <label for="url">Bookmark URL</label>
                <input 
                    type="text" 
                    id="url" 
                    name="url" 
                    placeholder="Enter Bookmark URL" 
                    value="{{ old('url', $bookmark->url ?? '') }}" 
                    required
                >
                @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username Input -->
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Enter Username" 
                    value="{{ old('username', $bookmark->username ?? '') }}"
                >
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="text" 
                    id="password" 
                    name="password" 
                    placeholder="Enter Password" 
                    value="{{ old('password', $bookmark->password ?? '') }}"
                >
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category Dropdown -->
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $bookmark->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ isset($bookmark) ? 'Update Bookmark' : 'Create Bookmark' }}</button>
            </div>
        </form>
    </div>
@endsection
