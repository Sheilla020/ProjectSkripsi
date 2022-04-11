@extends('layouts.template')
@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
    </div>
</div>

<h2>Data Pegawai</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profile as $index => $profile)
            <tr>
                <td scope="row">{{ $index + 1 }}</td>
                <td>{{ $profile->full_name }}</td>
                <td>{{ $profile->posisi->nama}}</td>
                <td>
                    @foreach ($profile->pengalaman as $pengalaman)
                    <strong>{{ $pengalaman->nama_projek }}</strong>
                    <p>{{ $pengalaman->start_date }} -> {{ $pengalaman->end_date }}</p>
                    @endforeach
                </td>
                <td>
                    <button type="button" class="btn btn-success">
                        <a style="color: white;" href="{{route('profile.show', [$profile->id])}}">View</a>
                    </button>
                    <button type="button" class="btn btn-warning">
                        <a style="color: white;" href="{{route('profile.show', [$profile->id])}}">Edit</a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection