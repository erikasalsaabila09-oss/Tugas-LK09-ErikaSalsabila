<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto">

    <h1 class="text-3xl font-bold mb-4">📚 Data Buku</h1>

    <a href="{{ route('books.create') }}"
       class="bg-green-500 text-white px-4 py-2 rounded">
        + Tambah Buku
    </a>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">

        @foreach($books as $book)
        <div class="bg-white p-4 shadow rounded">

            @if($book->cover)
                <img src="{{ asset('storage/covers/'.$book->cover) }}" class="h-40 w-full object-cover">
            @endif

            <h2 class="font-bold text-lg mt-2">{{ $book->title }}</h2>
            <p>{{ $book->author }}</p>
            <p class="text-sm text-gray-500">{{ $book->publisher }} - {{ $book->year }}</p>

            <div class="mt-3 flex justify-between">
                <a href="{{ route('books.edit',$book->id) }}" class="text-blue-500">Edit</a>

                <form method="POST" action="{{ route('books.destroy',$book->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">Hapus</button>
                </form>
            </div>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>