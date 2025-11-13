@extends('layouts.app')

@section('content')
<h2>Tambah Jenis Alat</h2>
<form method="POST" action="{{ route('jenis-alat.store') }}">
    @csrf
    <input type="text" name="nama_jenis" placeholder="Nama Jenis">
    <button type="submit">Simpan</button>
</form>
@endsection

