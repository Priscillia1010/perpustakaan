@extends('layouts.perpustakaan')

@section('content')
<h2>Edit Petugas</h2>
<form action="{{ route('petugass.update', $petugas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $petugas->nama }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="email">Email :</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $petugas->email }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection