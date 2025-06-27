@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Selamat datang di halaman penyelenggara, {{ Auth::user()->name }}</h1>

    <a href="{{ route('penyelenggara.create') }}" class="btn btn-primary mb-3">+ Tambah Penyelenggara</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Nama Event</th>
                <th>Tanggal Event</th>
                <th>Lokasi Event</th>
                <th>Deskripsi Event</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->telepon }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->nama_event }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_event)->format('d-m-Y') }}</td>
                <td>{{ $p->lokasi_event }}</td>
                <td>{{ $p->deskripsi_event }}</td>
                <td>
                    <a href="{{ route('penyelenggara.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('penyelenggara.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center text-muted">Belum ada data penyelenggara.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
