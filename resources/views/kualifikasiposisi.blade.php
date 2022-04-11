@extends('layouts.template')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('sky/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('sky/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

<!-- End plugin css for this page -->
@section('main')
<div class="container">
    <div class="row g-5">
        <div class="col-12">
            <div class=>
                <div class="card-body">

                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Kualifikasi -->
                        <div class="card col-12 mt-5">
                            <div class="card-body">
                                <h4 class="card-title">Perbandingan Kriteria</h4>
                                <div class="row">
                                    <div class="col-md-10">

                                        <div class="col-12 mb-2">
                                            <label for="firstName" class="form-label">Tingkat Pendidikan</label>
                                            <select class="form-control" name="" value="{{ old('profile_id_posisi') }}">
                                                @foreach ($posisi as $p)
                                                <option value="SMA">SMA</option>
                                                <option value="SMK">SMK</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="firstName" class="form-label">Jurusan Pendidikan</label>
                                            <select class="form-control" name="" value="{{ old('profile_id_posisi') }}">
                                                @foreach ($posisi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label class="form-label">Pengalaman</label>
                                            <input type="number" class="form-control" name="" value="{{ old('profile_pendidikan') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label class="form-label">Pernah Bekerja di Perusahaan Oil & Gas</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label class="form-label">Gaji yang Diharapkan</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label class="form-label">Status Pekerja</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label class="form-label">kapan bisa bergabung dengan Perusahaan</label>
                                            <input type="date" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <button type="button" id="button_add_pengalaman" class="btn btn-primary mt-2">Add</button>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-warning">Cancel</button>
                        </div>
                    </form>
                    <!-- form tes -->
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Kualifikasi -->
                        <div class="card col-12 mt-5">
                            <div class="card-body">
                                <h4 class="card-title">Perbandingan Kriteria</h4>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="col-12 mb-2">
                                            <label for="address" class="form-label">Kriteria Posisi</label>
                                            <select class="form-control" name="profile_id_posisi" value="{{ old('profile_id_posisi') }}">
                                                @foreach ($posisi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Nama Instansi Pendidikan</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_full_name') }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="firstName" class="form-label">Tingkat Pendidikan</label>
                                                <select class="form-control" name="" value="{{ old('profile_id_posisi') }}">
                                                    @foreach ($posisi as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="firstName" class="form-label">Jurusan Pendidikan</label>
                                                <select class="form-control" name="" value="{{ old('profile_id_posisi') }}">
                                                    @foreach ($posisi as $p)
                                                    <option value="{{ $p->id }}">{{ $p->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Pengalaman</label>
                                            <input type="number" class="form-control" name="" value="{{ old('profile_pendidikan') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Pernah Bekerja di Perusahaan Oil & Gas</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address" class="form-label">Nama Perusahaan</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_bh_inggris') }}">
                                            <span class="text-muted">(Nama Perusahaan jika Pernah Bekerja di Oil & Gas)</span>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Gaji yang Diharapkan</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Status Pekerja saat ini</label>
                                            <input type="text" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">kapan bisa bergabung dengan Perusahaan</label>
                                            <input type="date" class="form-control" name="" value="{{ old('profile_non_formal') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <button type="button" id="button_add_pengalaman" class="btn btn-primary mt-2">Add</button>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-warning">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('javascript-internal')

@endpush