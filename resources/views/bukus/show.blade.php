@extends('layouts.perpustakaan')

@section('content')
<h2>Detail Buku</h2>
<div>
    <strong>Judul :</strong> {{ $buku->judul }}<br>
    <strong>Tahun :</strong> {{ $buku->tahun }}<br>
    <strong>Stock :</strong> {{ $buku->stock }}<br>
</div>
<br>
<a href="{{ route('bukus.index') }}" class="btn btn-primary">Kembali ke Daftar Buku</a>
@endsection