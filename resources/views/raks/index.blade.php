@extends('layouts.perpustakaan')

@section('content')
<h2 class="mb-3">Daftar Rak</h2>
<table class="table">
    <thead>
        <tr>
            <th>Kode
                <a href="{{ route('raks.index', ['sort' => 'asc','order' => 'kode']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('raks.index', ['sort' => 'desc','order' => 'kode']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Nama
                <a href="{{ route('raks.index', ['sort' => 'asc','order' => 'nama']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('raks.index', ['sort' => 'desc','order' => 'nama']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Lokasi
                <a href="{{ route('raks.index', ['sort' => 'asc','order' => 'lokasi']) }}">
                    <i class="fas fa-arrow-up"></i>
                </a>
                <a href="{{ route('raks.index', ['sort' => 'desc','order' => 'lokasi']) }}">
                    <i class="fas fa-arrow-down"></i>
                </a>
            </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($raks as $rak)
        <tr>
            <td>{{ $rak->kode }}</td>
            <td>{{ $rak->nama }}</td>
            <td>{{ $rak->lokasi }}</td>
            <td>
                <a href="{{ route('raks.show', $rak->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('raks.edit', $rak->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('raks.destroy', $rak->id) }}" method="POST" style="display:inline;">
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
{{ $raks->links() }}
<a href="{{ route('raks.create') }}" class="btn btn-success mb-3">Tambah Rak</a>
@endsection