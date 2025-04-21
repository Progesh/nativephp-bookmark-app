<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Listing</title>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
    ])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>