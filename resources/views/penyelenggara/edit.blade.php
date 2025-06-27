@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Penyelenggara</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada inputan Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penyelenggara.update', $penyelenggara->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $penyelenggara->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $penyelenggara->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $penyelenggara->telepon }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control">{{ $penyelenggara->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" value="{{ $penyelenggara->nama_event }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Event</label>
            <input type="date" name="tanggal_event" class="form-control" value="{{ $penyelenggara->tanggal_event }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi Event</label>
            <input type="text" name="lokasi_event" class="form-control" value="{{ $penyelenggara->lokasi_event }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Event</label>
            <textarea name="deskripsi_event" class="form-control">{{ $penyelenggara->deskripsi_event }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('penyelenggara.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
