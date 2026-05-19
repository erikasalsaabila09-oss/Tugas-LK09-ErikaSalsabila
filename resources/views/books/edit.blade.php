<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Edit Buku</h1>

    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input name="title" value="{{ $book->title }}" class="border p-2 w-full mb-2">
        <input name="author" value="{{ $book->author }}" class="border p-2 w-full mb-2">
        <input name="publisher" value="{{ $book->publisher }}" class="border p-2 w-full mb-2">
        <input name="year" value="{{ $book->year }}" class="border p-2 w-full mb-2">
        <input name="category" value="{{ $book->category }}" class="border p-2 w-full mb-2">

        <textarea name="description" class="border p-2 w-full mb-2">{{ $book->description }}</textarea>

        @if($book->cover)
            <img src="{{ asset('storage/covers/'.$book->cover) }}" width="120" class="mb-2">
        @endif

        <input type="file" name="cover" class="mb-2">

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

</body>
</html>