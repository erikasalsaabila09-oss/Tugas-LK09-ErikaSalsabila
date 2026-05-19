<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input name="title" placeholder="Title" class="border p-2 w-full mb-2">
        <input name="author" placeholder="Author" class="border p-2 w-full mb-2">
        <input name="publisher" placeholder="Publisher" class="border p-2 w-full mb-2">
        <input name="year" type="number" placeholder="Year" class="border p-2 w-full mb-2">
        <input name="category" placeholder="Category" class="border p-2 w-full mb-2">

        <textarea name="description" class="border p-2 w-full mb-2"></textarea>

        <input type="file" name="cover" class="mb-2">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

</body>
</html>