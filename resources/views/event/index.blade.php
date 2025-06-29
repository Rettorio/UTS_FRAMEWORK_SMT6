@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('stylecss')
    <style>
        .text-table {
            max-width:200px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
@endsection

@section('sidebar')
@include('penyelenggara.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <h3 class="mb-4">Event yang terdaftar</h3>

        <a href="{{ route('penyelenggara.event.create') }}" class="btn btn-sm btn-primary mb-3">+ Buat Event Baru</a>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

        <div class="col-lg-12 mt-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Event</th>
                                <th>Lokasi</th>
                                <th>Banner</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Harga Karcis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->nama_event }}</td>
                                    <td><p class="text-table">{{ $event->lokasi }}</p></td>
                                    <td><img  style="max-width:100px;max-height:100px;width:100px;height:100px;border-radius:0%;" src="{{ $event->banner1 }}" /></td>
                                    <td>{{ Carbon\Carbon::parse($event->jadwa_mulai)->format('H:i j M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($event->jadwal_selesai)->format('H:i j M Y') }}</td>
                                    <td>Rp. {{ $event->harga_tiket }}</td>
                                    <td>
                                        <div class="flex">
                                            <form id="form_delete_{{ $loop->iteration }}" action="{{ route('penyelenggara.event.destroy', $event->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="showDeleteAlert('form_delete_{{ $loop->iteration }}')" class="btn btn-sm btn-danger" id="hapus">Hapus</button>
                                            </form>
                                            <a href="{{ route('penyelenggara.event.edit', $event->id) }}" class="mt-2 btn btn-sm btn-warning">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        function showDeleteAlert(formId) {
            const form = document.getElementById(formId);
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "data wisata akan terhapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'konfirmasi'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } 
    </script>
@endsection