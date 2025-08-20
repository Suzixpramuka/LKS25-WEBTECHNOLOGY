@extends('layout')

@section('content')
<h1 class="mb-4">Portal Berita</h1>
<a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($beritas as $i => $berita)
        <tr>
            <td>{{ $i + $beritas->firstItem() }}</td>
            <td>{{ $berita->judul }}</td>
            <td>{{ $berita->created_at->format('d-m-Y H:i') }}</td>
            <td>
                <a href="{{ route('berita.edit', $berita) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('berita.destroy', $berita) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $beritas->links() }}
@endsection
