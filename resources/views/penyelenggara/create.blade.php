@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Penyelenggara</h2>

    <form action="{{ route('penyelenggara.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="nama_event" class="form-label">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_event" class="form-label">Tanggal Event</label>
            <input type="date" name="tanggal_event" class="form-control" value="{{ old('tanggal_event') }}">
        </div>

        <div class="mb-3">
            <label for="lokasi_event" class="form-label">Lokasi Event</label>
            <input type="text" name="lokasi_event" class="form-control" value="{{ old('lokasi_event') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi_event" class="form-label">Deskripsi Event</label>
            <textarea name="deskripsi_event" class="form-control">{{ old('deskripsi_event') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penyelenggara.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
