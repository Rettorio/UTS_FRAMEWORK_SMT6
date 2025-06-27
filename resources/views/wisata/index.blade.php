@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
            <h6 class="font-weight-normal mb-0">Data <span class="text-primary">Wisata</span></h6>
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
                        <th> Fasilitas </th>
                        <th> Harga tiket </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection