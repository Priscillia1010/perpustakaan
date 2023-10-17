@extends('layouts.perpustakaan')

@section('content')
<h2>Edit Buku</h2>
<form action="{{ route('bukus.update', $buku->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="judul">Judul :</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="tahun">Tahun :</label>
        <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $buku->tahun }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="stock">Stock :</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ $buku->stock }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection