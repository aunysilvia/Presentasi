@extends('layouts.app')

@section('content')
<h2>Edit Jenis Alat</h2>
<form method="POST" action="{{ route('jenis-alat.update', $jenis->id) }}">
    @csrf @method('PUT')
    <input type="text" name="nama_jenis" value="{{ $jenis->nama_jenis }}">
    <button type="submit">Update</button>
</form>
@endsection

