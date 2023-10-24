@extends('layouts.perpustakaan')

@section('content')
<h2 class="mb-3">Daftar Petugas</h2>
<form action="{{ route('petugass.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari petugas..." name="query"
            value="{{ request('query') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary ml-3" type="submit">Cari</button>
            <a href="{{ route('petugass.index') }}" class="ml-3 btn btn-outline-secondary">Clear</a>
        </div>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Nama
                <a href="{{ route('petugass.index', ['sort' => 'asc','order' => 'nama']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('petugass.index', ['sort' => 'desc','order' => 'nama']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Email
                <a href="{{ route('petugass.index', ['sort' => 'asc','order' => 'email']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('petugass.index', ['sort' => 'desc','order' => 'email']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($petugass as $petugas)
        <tr>
            <td>{{ $petugas->nama }}</td>
            <td>{{ $petugas->email }}</td>
            <td>
                <a href="{{ route('petugass.show', $petugas->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('petugass.edit', $petugas->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('petugass.destroy', $petugas->id) }}" method="POST" style="display:inline;">
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
{{ $petugass->links() }}
<a href="{{ route('petugass.create') }}" class="btn btn-success mb-3">Tambah Petugas</a>
@endsection