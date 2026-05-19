<!DOCTYPE html>
<html>
<head>
    <title>CRUD Buku Digital</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary px-3">
    <a class="navbar-brand" href="{{ route('books.index') }}">
        📚 Buku Digital
    </a>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

</body>
</html>