@extends('layouts.perpustakaan')

@section('content')
<h2>Tambah Anggota</h2>
<form action="{{ route('anggotas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kode">Kode :</label>
        <input type="number" class="form-control" id="kode" name="kode" required>
    </div>
    <div class="form-group mt-3">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group mt-3">
        <label for="email">Email :</label>
        <input type="text" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection