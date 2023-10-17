@extends('layouts.perpustakaan')

@section('content')
<h2>Detail Anggota</h2>
<div>
    <strong>Kode :</strong> {{ $anggota->kode }}<br>
    <strong>Nama :</strong> {{ $anggota->nama }}<br>
    <strong>Email :</strong> {{ $anggota->email }}<br>
</div>
<br>
<a href="{{ route('anggotas.index') }}" class="btn btn-primary">Kembali ke Daftar Anggota</a>
@endsection