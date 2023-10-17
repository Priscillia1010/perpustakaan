@extends('layouts.perpustakaan')

@section('content')
<h2>Edit Anggota</h2>
<form action="{{ route('anggotas.update', $anggota->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="kode">Kode :</label>
        <input type="number" class="form-control" id="kode" name="kode" value="{{ $anggota->kode }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota->nama }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="email">Email :</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $anggota->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection