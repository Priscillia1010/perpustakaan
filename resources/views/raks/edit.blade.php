@extends('layouts.perpustakaan')

@section('content')
<h2>Edit Rak</h2>
<form action="{{ route('raks.update', $rak->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="kode">Kode :</label>
        <input type="number" class="form-control" id="kode" name="kode" value="{{ $rak->kode }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $rak->nama }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="lokasi">Lokasi :</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $rak->lokasi }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection