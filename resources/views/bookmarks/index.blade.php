@extends('layout')

@section('content')
    <h1>Bookmark Listing</h1>

    <!-- Filter Section -->
    <div class="filter-section">
        <form action="{{ route('urls.index') }}" method="GET">
            <input 
                type="text" 
                id="search" 
                name="search" 
                placeholder="Search bookmarks..." 
                class="search-bar" 
                value="{{ request('search') }}"
            >
            <select id="category" name="category" class="category-dropdown">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-search">Search</button>
        </form>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Bookmark Table -->
    <table class="bookmark-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>URL</th>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookmarks as $bookmark)
                <tr data-category="{{ $bookmark->category->id ?? 'none' }}">
                    <td>{{ $bookmark->id }}</td>
                    <td>{{ $bookmark->category->name ?? 'Uncategorized' }}</td>
                    <td>
                        <a href="{{ $bookmark->url }}" target="_blank" style="color: #007bff; text-decoration: underline;">
                            {{ $bookmark->url }}
                        </a>
                        <button type="button" class="btn-icon" onclick="copyToClipboard('{{ $bookmark->url }}')">
                            <i class="fa fa-copy"></i>
                        </button>
                    </td>
                    <td>
                        @if(!empty($bookmark->username))
                            {{ $bookmark->username }}
                            <button type="button" class="btn-icon" onclick="copyToClipboard('{{ $bookmark->username }}')">
                                <i class="fa fa-copy"></i>
                            </button>
                        @endif
                    </td>
                    <td>
                        @if(!empty($bookmark->password))
                            <span class="password" id="password-{{ $bookmark->id }}">••••••••</span>
                            <button type="button" class="btn-icon" onclick="togglePassword({{ $bookmark->id }})">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button type="button" class="btn-icon" onclick="copyToClipboard('{{ $bookmark->password }}')">
                                <i class="fa fa-copy"></i>
                            </button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('urls.edit', $bookmark) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('urls.destroy', $bookmark) }}" method="POST" style="display:inline;">
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

<script>
    function togglePassword(id) {
        const passwordSpan = document.getElementById(`password-${id}`);
        const isHidden = passwordSpan.textContent === '••••••••';

        if (isHidden) {
            passwordSpan.textContent = '{{ $bookmark->password }}'; // Replace with the actual password
        } else {
            passwordSpan.textContent = '••••••••';
        }
    }

    function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        showCopyNotification('Copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}

    function showCopyNotification(message) {
        // Create a notification element
        const notification = document.createElement('div');
        notification.className = 'copy-notification';
        notification.textContent = message;

        // Append the notification to the body
        document.body.appendChild(notification);

        // Remove the notification after 2 seconds
        setTimeout(() => {
            notification.remove();
        }, 2000);
    }
</script>
