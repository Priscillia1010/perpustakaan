@extends('layouts.perpustakaan')

@section('content')
<h2>Detail Rak</h2>
<div>
    <strong>Kode :</strong> {{ $rak->kode }}<br>
    <strong>Nama :</strong> {{ $rak->nama }}<br>
    <strong>Lokasi :</strong> {{ $rak->lokasi }}<br>
</div>
<br>
<a href="{{ route('raks.index') }}" class="btn btn-primary">Kembali ke Daftar Rak</a>
@endsection