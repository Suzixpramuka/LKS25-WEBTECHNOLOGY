@extends('layout')

@section('content')
<h1>Tambah Berita</h1>
<form action="{{ route('berita.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea name="isi" class="form-control" rows="6" required></textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
