@extends('layout')

@section('content')
<h1>Edit Berita</h1>
<form action="{{ route('berita.update', $berita) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
    </div>
    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea name="isi" class="form-control" rows="6" required>{{ $berita->isi }}</textarea>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
