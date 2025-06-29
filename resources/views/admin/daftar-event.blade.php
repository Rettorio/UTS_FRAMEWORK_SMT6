@extends('layouts.dashboard')

@section('title', 'Daftar Event')

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
            <h3 class="font-weight-normal mb-0"><span class="text-primary">Event</span> yang terdaftar</h2>
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
                        <th>lokasi</th>
                        <th>jadwal </th>
                        <th>status</th>
                        <th>penyelenggara</th>
                        <th> Harga tiket </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->nama_event }}</td>
                                <td><img style="max-width:100px;max-height:100px;width:100px;height:100px;border-radius:0%;" src="{{ $event->banner1 }}" /></td>
                                <td class="text-table">{{ $event->lokasi }}</td>
                                <td>{{ Carbon\Carbon::parse($event->jadwal_selesai)->format('H:i j M Y') }}</td>
                                <td>
                                    @switch($event->status)
                                        @case("coming")
                                            <span class="badge bg-info text-dark">Coming</span>
                                            @break
                                        @case("active")
                                            <span class="badge bg-success">Aktif</span>
                                            @break
                                        @case("done")
                                            <span class="badge bg-light text-dark">Berakhir</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>{{ $event->penyelenggara }}</td>
                                <td>Rp. {{ $event->harga_tiket }}</td>
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