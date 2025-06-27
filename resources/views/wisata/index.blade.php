@extends('layouts.dashboard')

@section('title', 'Wisata')

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
    @include('admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
            <h6 class="font-weight-normal mb-0">Data Wisata <a class="text-primary" href="{{ route('admin.wisata.create') }}">tambah data</a></h6>
        </div>
        <div class="col-lg-12 mt-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th> No </th>
                        <th> Nama </th>
                        <th> Banner </th>
                        <th> Lokasi </th>
                        <th> Fasilitas </th>
                        <th> Harga tiket </th>
                        <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wisata as $w)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $w->nama_tempat }}</td>
                                <td><img style="max-width:100px;max-height:100px;width:100px;height:100px;border-radius:0%;" src="{{ $w->banner1 }}" /></td>
                                <td><p class="text-table">{{ $w->lokasi }}</p></td>
                                <td><p class="text-table">{{ $w->fasilitas }}</p></td>
                                <td>Rp. {{ $w->harga_tiket }}</td>
                                <td>
                                    <div class="flex">
                                        <form id="form_delete_{{ $loop->iteration }}" action="{{ route('admin.wisata.destroy', $w->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="showDeleteAlert('form_delete_{{ $loop->iteration }}')" class="btn btn-sm btn-danger" id="hapus">Hapus</button>
                                        </form>
                                        <a href="{{ route('admin.wisata.edit', $w->id) }}" class="mt-2 btn btn-sm btn-warning">Edit</a>
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