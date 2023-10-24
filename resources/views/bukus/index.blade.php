@extends('layouts.perpustakaan')

@section('content')
<h2 class="mb-3">Daftar Buku</h2>
<form action="{{ route('bukus.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari buku..." name="query" value="{{ request('query') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary ml-3" type="submit">Cari</button>
            <a href="{{ route('bukus.index') }}" class="ml-3 btn btn-outline-secondary">Clear</a>
        </div>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Judul
                <a href="{{ route('bukus.index', ['sort' => 'asc','order' => 'judul']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('bukus.index', ['sort' => 'desc','order' => 'judul']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Tahun
                <a href="{{ route('bukus.index', ['sort' => 'asc','order' => 'tahun']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('bukus.index', ['sort' => 'desc','order' => 'tahun']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Stock
                <a href="{{ route('bukus.index', ['sort' => 'asc','order' => 'stock']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>

                <a href="{{ route('bukus.index', ['sort' => 'desc','order' => 'stock']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bukus as $buku)
        <tr>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->tahun }}</td>
            <td>{{ $buku->stock }}</td>
            <td>
                <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Anda ingin menghapus?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $bukus->links() }}
<a href="{{ route('bukus.create') }}" class="btn btn-success mb-3">Tambah Buku</a>
@endsection