@extends('layouts.app')

@section('content')
<h2>Daftar Jenis Alat</h2>
<a href="{{ route('jenis-alat.create') }}">Tambah Jenis</a>
<ul>
    @foreach($data as $jenis)
    <li>{{ $jenis->nama_jenis }} |
        <a href="{{ route('jenis-alat.edit', $jenis->id) }}">Edit</a> |
        <form action="{{ route('jenis-alat.destroy', $jenis->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection

