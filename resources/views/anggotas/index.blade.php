@extends('layouts.perpustakaan')

@section('content')
<h2 class="mb-3">Daftar Anggota</h2>
<form action="{{ route('anggotas.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari anggota..." name="query"
            value="{{ request('query') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
            <a href="{{ route('anggotas.index') }}" class="btn btn-outline-secondary">Clear</a>
        </div>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Kode
                <a href="{{ route('anggotas.index', ['sort' => 'asc','order' => 'kode']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('anggotas.index', ['sort' => 'desc','order' => 'kode']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Nama
                <a href="{{ route('anggotas.index', ['sort' => 'asc','order' => 'nama']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('anggotas.index', ['sort' => 'desc','order' => 'nama']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Email
                <a href="{{ route('anggotas.index', ['sort' => 'asc','order' => 'email']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('anggotas.index', ['sort' => 'desc','order' => 'email']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anggotas as $anggota)
        <tr>
            <td>{{ $anggota->kode }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->email }}</td>
            <td>
                <a href="{{ route('anggotas.show', $anggota->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST" style="display:inline;">
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
{{ $anggotas->links() }}
<a href="{{ route('anggotas.create') }}" class="btn btn-success mb-3">Tambah Anggota</a>
@endsection