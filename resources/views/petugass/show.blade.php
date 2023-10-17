@extends('layouts.perpustakaan')

@section('content')
<h2>Detail Petugas</h2>
<div>
    <strong>Nama :</strong> {{ $petugas->nama }}<br>
    <strong>Email :</strong> {{ $petugas->email }}<br>
</div>
<br>
<a href="{{ route('petugass.index') }}" class="btn btn-primary">Kembali ke Daftar Petugas</a>
@endsection