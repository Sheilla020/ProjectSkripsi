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
                    <div class="card col-12 mt-5">
                        <div class="card-body">
                            <div class="col-md-10">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>no</td>
                                            <td>Kriteria</td>
                                            <td>Bobot</td>
                                        </tr>
                                    </thead>
                                    @foreach ($kriteria as $p)
                                    <tbody>
                                        <tr>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->nama_kriteria}}</td>
                                            @if($p->bobot !== "NULL")
                                            <td>Input Nilai</td>
                                            @else
                                            <td>{{ $p->bobot }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- <div class="card">
                            <form action="proses.php#tab6" method="POST" enctype="multipart/form-data">
                                <div class="input m-0">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Tingkat Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K12" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Bidang Pendidikan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tingkat Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K13" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Pengalalam Bekerja
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tingkat Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K14" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Pengalaman di Perusahaan oil & Gas
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tingkat Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K15" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Gaji yang Diharapkan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Tingkat Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K16" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Status Pekerja Saat ini
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bidang Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K23" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Pengalalam Bekerja
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bidang Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K24" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Pengalaman di Perusahaan oil & Gas
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bidang Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K25" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Gaji yang di Harapkan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bidang Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K26" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Status Pekerja saat ini
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bidang Pendidikan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K23" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Pengalaman Bekerja
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pengalaman Bekerja
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K34" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Pengalalam Di Perusahaan Oil Dan Gas
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pengalaman Bekerja
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K35" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Gaji yang di Harapkan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pengalaman Bekerja
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K36" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Status Pekerja saat ini
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pengalalam Di Perusahaan Oil Dan Gas
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K45" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Gaji yang di Harapkan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pengalalam Di Perusahaan Oil Dan Gas
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K46" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Status Pekerja saat ini
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Gaji yang di Harapkan
                                                </td>
                                                <td>
                                                    <select class="form-control" name="K56" value="{{ old('profile_id_posisi') }}">
                                                        <option value="1">1 sama penting dengan</option>
                                                        <option value="2">2 mendekati sedikit lebih penting dari</option>
                                                        <option value="3">3 sedikit lebih penting dari</option>
                                                        <option value="4">4 mendekati lebih penting dari</option>
                                                        <option value="5">5 lebih pneting dari</option>
                                                        <option value="6">6 mendekati sangat penting dari </option>
                                                        <option value="7">7 sangat penting dari</option>
                                                        <option value="8">8 mendekati mutlak dari</option>
                                                        <option value="9">9 mutlak sangat pentingdari</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    Status Pekerja saat ini
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    <form action="{{ route('inputperbandingan') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Kualifikasi -->
                        <div class="card col-12 mt-5">
                            <div class="card-body">
                                <h4 class="card-title">Perbandingan Kriteria {{ $title }}</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>Kriteria</td>
                                                    @foreach ($kriteria as $p)
                                                    <td style="font-size: small;">{{ $p->nama_kriteria}}</td>
                                                    @endforeach
                                                </tr>
                                                <?php
                                                $j = 0; ?>
                                                @foreach ($kriteria as $p)
                                                <tr>
                                                    <td style="font-size: small;">{{ $p->nama_kriteria }} <?php $j++ ?></td>
                                                    <?php $i = 0; ?>
                                                    @foreach ($kriteria as $a)
                                                    <?php $i++ ?>
                                                    @if($p->id!=$a->id)
                                                    <td>
                                                        @if($j >= $i)
                                                        <input type="text" size="2px" id="numCopy<?php echo $i . $j  ?>" name="<?php echo 'k' . $i . $j  ?>" disabled>
                                                        @else
                                                        <input type="text" size="2px" id="numInput<?php echo $i . $j  ?>" name="<?php echo 'k' . $i . $j  ?>" onkeyup="copytextbox()">
                                                        @endif
                                                    </td>
                                                    @else
                                                    <td>
                                                        <input type="text" size="2px" name="<?php echo 'k' . $i . $j  ?>" disabled value="1">
                                                    </td>
                                                    @endif
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                                <input type="hidden" name="jumlah_kriteria" value="{{ $kriteria->count() }}">
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

<script src="js/row1.js"></script>
@endsection