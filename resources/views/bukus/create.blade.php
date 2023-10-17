@extends('layouts.perpustakaan')

@section('content')
<h2>Tambah Buku</h2>
<form action="{{ route('bukus.store') }}" method="POST">
    @csrf
    <div class="form-group mt-3">
        <label for="judul">Judul :</label>
        <input type="text" class="form-control" id="judul" name="judul" required>
    </div>
    <div class="form-group mt-3">
        <label for="tahun">Tahun :</label>
        <input type="text" class="form-control" id="tahun" name="tahun" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock :</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection