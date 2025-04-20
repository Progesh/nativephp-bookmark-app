<!-- filepath: /var/www/project/bookmark-url/resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Listing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        <h1>Bookmark Listing</h1>

        <!-- Search and Filter Section -->
        <div class="filter-section">
            <input type="text" id="search" placeholder="Search bookmarks..." class="search-bar">
            <select id="category" class="category-dropdown">
                <option value="">All Categories</option>
                <option value="work">Work</option>
                <option value="personal">Personal</option>
                <option value="education">Education</option>
            </select>
            <button class="btn btn-search" onclick="filterBookmarks()">Search</button>
        </div>

        <!-- Bookmark Table -->
        <table class="bookmark-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>URL</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="bookmark-list">
                <!-- Example Data -->
                <tr data-category="work">
                    <td>1</td>
                    <td>Google</td>
                    <td><a href="https://google.com" target="_blank">https://google.com</a></td>
                    <td>admin123#@!</td>
                    <td>
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Delete</button>
                    </td>
                </tr>
                <tr data-category="personal">
                    <td>2</td>
                    <td>GitHub</td>
                    <td><a href="https://github.com" target="_blank">https://github.com</a></td>
                    <td>test123</td>
                    <td>
                        <button class="btn btn-edit">Edit</button>
                        <button class="btn btn-delete">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>