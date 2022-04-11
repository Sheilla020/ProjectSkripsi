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
                        <!-- //detail profile -->
                        <div class="card col-12">
                            <div class="card-body">
                                <h4 class="card-title">Detail Profile</h4>
                                <p class="card-description">
                                    Personal info
                                </p>
                                <div class="row">
                                    <div class="col-md-3 m-2">
                                        <img src="{{ asset('assets/default.png') }}" alt="profile" width="200px" class="img-preview" />
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-12 mb-2">
                                            <label for="address" class="form-label">Posisi yang Dilamar</label>
                                            <select class="form-control" name="profile_id_posisi" value="{{ old('profile_id_posisi') }}">
                                                @foreach ($posisi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="profile_full_name" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="profile_full_name" value="{{ old('profile_full_name') }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="profile_tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="profile_tempat_lahir" value="{{ old('profile_tempat_lahir') }}">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="profile_tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="profile_tgl_lahir" value="{{ old('profile_tgl_lahir') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2 mb-2">
                                            <label for="address2" class="form-label">Jenis Kelamin</label>
                                            <div class="row m-2">
                                                <div class="form-check col-sm-6">
                                                    <label for="address2" class="form-label">Perempuan</label>
                                                    <input type="radio" class="form-check-input" name="profile_gander" value="P">
                                                </div>
                                                <div class="form-check col-sm-6">
                                                    <label for="profile_gander" class="form-label">Laki - Laki</label>
                                                    <input type="radio" class="form-check-input" name="profile_gander" value="L">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="profile_tingkat_pendidikan" class="form-label">Tingkat Pendidikan</label>
                                            <select class="form-control" name="profile_tingkat_pendidikan" value="{{ old('profile_tingkat_pendidikan') }}">
                                                <option value="SMA">SMA/SMU</option>
                                                <option value="SMK">SMK</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Bidang Pendidikan</label>
                                            <input type="text" class="form-control" name="profile_jurusan_pendidikan" value="{{ old('profile_jurusan_pendidikan') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Asal Instansi atau Universitasn</label>
                                            <input type="text" class="form-control" name="profile_asal_Instansi" value="{{ old('profile_asal_instansi') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Pendidikan Non Formal</label>
                                            <input type="text" class="form-control" name="profile_non_formal" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address" class="form-label">Penguasaan Bahasa Inggris</label>
                                            <div class="row m-2">
                                                <div class="form-check col-sm-2">
                                                    <label for="address2" class="form-label">Very Bad</label>
                                                    <input type="radio" class="form-check-input" name="profile_bh_inggris" value="1">
                                                </div>
                                                <div class="form-check col-sm-2">
                                                    <label for="address2" class="form-label">Bad</label>
                                                    <input type="radio" class="form-check-input" name="profile_bh_inggris" value="2">
                                                </div>
                                                <div class="form-check col-sm-2">
                                                    <label for="address2" class="form-label">Batter</label>
                                                    <input type="radio" class="form-check-input" name="profile_bh_inggris" value="3">
                                                </div>
                                                <div class="form-check col-sm-2">
                                                    <label for="address2" class="form-label">Good</label>
                                                    <input type="radio" class="form-check-input" name="profile_bh_inggris" value="4">
                                                </div>
                                                <div class="form-check col-sm-2">
                                                    <label for="address2" class="form-label">Excelent</label>
                                                    <input type="radio" class="form-check-input" name="profile_bh_inggris" value="5">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="file_name">Image <span class="text-muted">(Foto Profile)</span></label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="image" name="image" onchange="previewImg()" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kualifikasi -->
                        <div class="card col-12 mt-5  pk-group ">
                            <h4 class="card-title m-2">Kualifikasi</h4>
                            <div class="row m-4 g-3" data-index-pengalaman="0">
                                <div class="col-sm-6">
                                    <label for="kualifikasi_pengalaman" class="form-label">Pengalaman Bekerja</label>
                                    <input type="number" class="form-control" name="kualifikasi_pengalaman">
                                </div>

                                <div class="col-sm-6">
                                    <label for="kualifikasi_gaji" class="form-label">Gaji yang Diharapkan</label>
                                    <input type="text" class="form-control" id="" name="kualifikasi_gaji">
                                </div>

                                <div class="col-12">
                                    <label for="kualifikasi_status_pekerja" class="form-label">Status Pekerja Saat Ini</label>
                                    <select class="form-control" name="kualifikasi_status_pekerja" value="{{ old('kualifikasi_status_pekerja') }}">
                                        <option value="Penganguran">Penganguran</option>
                                        <option value="Mengundurkan Diri">Mengundurkan Diri</option>
                                        <option value="Fresh Grduate">Fresh Grduate</option>
                                        <option value="Freelanch">Freelanch</option>
                                        <option value="Interhip">Intership</option>
                                        <option value="Habis Kontrak">Habis Kontrak</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Permanent">Permanent</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="kualifikasi_pengalaman_oilgas" class="form-label">Memiliki Pengalaman Berkerja di Perusahaan Oil & Gas</label>
                                    <div class="row m-2">
                                        <div class="form-check col-sm-6">
                                            <label class="form-label">Ya</label>
                                            <input type="radio" class="form-check-input" name="kualifikasi_pengalaman_oilgas" value="ya">
                                        </div>
                                        <div class="form-check col-sm-6">
                                            <label class="form-label">Tidak</label>
                                            <input type="radio" class="form-check-input" name="kualifikasi_pengalaman_oilgas" value="tidak">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="kualifikasi_nama_perusahaan" class="form-label">Nama Perusahaan Oil & Gas</label>
                                    <input type="text" class="form-control" name="kualifikasi_nama_perusahaan">
                                </div>

                                <div class="col-12">
                                    <label for="input_pengalaman_job_des_0" class="form-label">Alasan Anda Mengundurkan Diri dari Perusahaan Sebelumnya </label>
                                    <textarea type="text" class="form-control" id="input_pengalaman_job_des_0" name="pengalaman[0][job_des]"></textarea>
                                </div>

                            </div>
                        </div>
                        <!-- berkas -->
                        <div class="card col-12 mt-5  pk-group ">
                            <h4 class="card-title m-2">Berkas File</h4>
                            <div class="row m-4 g-3" data-index-pengalaman="0">
                                <div class="col-sm-6">
                                    <label for="kualifikasi_pengalaman" class="form-label">Nomer NIK KTP</label>
                                    <input type="number" class="form-control" name="kualifikasi_pengalaman">
                                </div>

                                <div class="col-sm-6">
                                    <label for="kualifikasi_gaji" class="form-label">Nomer NPWP <span class="text-muted">(Jika Memiliki)</span></label>
                                    <input type="text" class="form-control" id="" name="kualifikasi_gaji">
                                </div>

                                <div class="form-group row">
                                    <label for="file_name">Ungah Scan KTP</label>
                                    <div class="col-12 input-group">
                                        <input type="file" class="form-control" name="filektp" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file_name">Ungah Ijazah</label>
                                    <div class="col-12 input-group">
                                        <input type="file" class="form-control" name="fileijz" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="file_name">Ungah CV</label>
                                    <div class="col-12 input-group">
                                        <input type="file" class="form-control" name="filecv" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                                    </div>
                                </div>

                                <!-- Sertifikat -->
                                <div id="list-Sertifikat">
                                    @if (old('pengalaman'))
                                    @foreach (old('sertifikat') as $key => $sertifikat)
                                    <div data-index-sertifikat="{{ $key }}">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="input_sertivikat_nama_penyelengara_{{ $key }}" class="form-label">Peyelengara Sertifikat</label>
                                                <input type="text" class="form-control {{ $errors->has("sertivikat.{$key}.nama_penyelengara") ? 'is-invalid' : null }}" id="input_sertivikat_nama_penyelengara_{{ $key }}" name="sertivikat[{{ $key }}][nama_penyelengara]" value="{{ $sertivikat['nama_penyelengara'] }}">
                                            </div>

                                            <div class="col-sm-2">
                                                <label for="input_sertivikat_thn_start_{{ $key }}" class="form-label">Tahun Mulai</label>
                                                <select class="form-control {{ $errors->has("sertivikat.{$key}.thn_start") ? 'is-invalid' : null }}" id="input_sertivikat_thn_start_{{ $key }}" name="sertivikat[{{ $key }}][thn_start]" value="{{ $sertivikat['thn_start'] }}">
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 1999; $x--) {
                                                    ?>
                                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="input_sertivikat_thn_end_{{ $key }}" class="form-label">Tahun Berakhir</label>
                                                <select class="form-control {{ $errors->has("sertivikat.{$key}.thn_end") ? 'is-invalid' : null }}" id="input_sertivikat_thn_end_{{ $key }}" name="sertivikat[{{ $key }}][thn_end]" value="{{ $sertivikat['thn_end'] }}">
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 1999; $x--) {
                                                    ?>
                                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2 mt-4">
                                                <button type="button" id="button_add_sertivikat" class="btn btn-primary mt-2">Add</button>
                                            </div>
                                        </div>
                                        <div class="col-12 row">
                                            <label for="input_sertivikat_file_serti_{{ $key }}">Ungah Sertifikat <span class="text-muted"></span></label>
                                            <div class="input-group">
                                                <input type="file" class="form-control  {{ $errors->has("sertivikat.{$key}.file_serti") ? 'is-invalid' : null }}" id="input_sertivikat_file_serti_{{ $key }}" name="sertivikat[{{ $key }}][file_serti]" value="{{ $sertivikat['file_serti'] }}" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div data-index-sertivikat="0">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="input_sertivikat_nama_penyelengara_0" class="form-label">Peyelengara Sertifikat</label>
                                                <input type="text" class="form-control" id="input_sertivikat_nama_penyelengara_0" name="sertivikat[0][nama_penyelengara]">
                                            </div>

                                            <div class="col-sm-2">
                                                <label for="input_sertivikat_thn_start_0" class="form-label">Tahun Mulai</label>
                                                <select class="form-control" id="input_sertivikat_thn_start_0" name="sertivikat[0][thn_start]">
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 1999; $x--) {
                                                    ?>
                                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="input_sertivikat_thn_end_0" class="form-label">Tahun Berakhir</label>
                                                <select class="form-control" id="input_sertivikat_thn_end_0" name="sertivikat[0][thn_end]">
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 1999; $x--) {
                                                    ?>
                                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2 mt-4">
                                                <button type="button" id="button_add_sertivikat" class="btn btn-primary mt-2">Add</button>
                                            </div>
                                        </div>
                                        <div class="col-12 row">
                                            <label for="input_sertivikat_file_serti_0">Ungah Sertifikat <span class="text-muted"></span></label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="input_sertivikat_file_serti_0" name="sertivikat[0][file_serti]" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- pengalaman kerja -->
                        <div id="list-pengalaman">
                            @if (old('pengalaman'))
                            @foreach (old('pengalaman') as $key => $pengalaman)
                            <div class="card col-12 mt-5  pk-group ">
                                <h4 class="card-title m-2">Pengalaman Kerja</h4>
                                <div class="row m-4 g-3" data-index-pengalaman="{{ $key }}">
                                    <div class="col-sm-6">
                                        <label for="input_pengalaman_start_date_{{ $key }}" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control {{ $errors->has("pengalaman.{$key}.start_date") ? 'is-invalid' : null }}" id="input_pengalaman_start_date_{{ $key }}" name="pengalaman[{{ $key }}][start_date]" value="{{ $pengalaman['start_date'] }}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input_pengalaman_end_date_{{ $key }}" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control {{ $errors->has("pengalaman.{$key}.end_date") ? 'is-invalid' : null }}" id="input_pengalaman_end_date_{{ $key }}" name="pengalaman[{{ $key }}][end_date]" id="" value="{{ $pengalaman['end_date'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_nama_projek_{{ $key }}" class="form-label">Nama Proyek</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.nama_projek") ? 'is-invalid' : null }}" id="input_pengalaman_nama_projek_{{ $key }}" name="pengalaman[{{ $key }}][nama_projek]" value="{{ $pengalaman['nama_projek'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_lokasi_{{ $key }}" class="form-label">Lokasi Proyek</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.lokasi") ? 'is-invalid' : null }}" id="input_pengalaman_lokasi_{{ $key }}" name="pengalaman[{{ $key }}][lokasi]" value="{{ $pengalaman['lokasi'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_pengguna_{{ $key }}" class="form-label">Pengguna Barang/Jasa</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.pengguna") ? 'is-invalid' : null }}" id="input_pengalaman_pengguna_{{ $key }}" name="pengalaman[{{ $key }}][pengguna]" value="{{ $pengalaman['pengguna'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_perusahaan_{{ $key }}" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.perusahaan") ? 'is-invalid' : null }}" id="input_pengalaman_perusahaan_{{ $key }}" name="pengalaman[{{ $key }}][perusahaan]" value="{{ $pengalaman['perusahaan'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_job_des_{{ $key }}" class="form-label">Uraian Tugas</label>
                                        <textarea type="text" class="form-control {{ $errors->has("pengalaman.{$key}.job_des") ? 'is-invalid' : null }}" id="input_pengalaman_job_des_{{ $key }}" name="pengalaman[{{ $key }}][job_des]" value="{{ $pengalaman['job_des'] }}"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_posisi_{{ $key }}" class="form-label">Posisi</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.posisi") ? 'is-invalid' : null }}" id="input_pengalaman_posisi_{{ $key }}" name="pengalaman[{{ $key }}][posisi]" value="{{ $pengalaman['posisi'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_status_pekerja_{{ $key }}" class="form-label">Status Kepegawaian pada Perusahaan</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.status_pekerja") ? 'is-invalid' : null }}" id="input_pengalaman_status_pekerja_{{ $key }}" name="pengalaman[{{ $key }}][status_pekerja]" value="{{ $pengalaman['status_pekerja'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_referensi_{{ $key }}" class="form-label">Surat Referensi dari Pengguna barang/jasa Tahun sebelumnya <Span class="text-muted">(Optional)</Span></label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.referensi") ? 'is-invalid' : null }}" id="input_pengalaman_referensi_{{ $key }}" name="pengalaman[{{ $key }}][referensi]" value="{{ $pengalaman['referensi'] }}">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <button type="button" class="btn btn-danger mt-2" data-type="btn-remove" data-index-pengalaman="{{ $key }}">Remove</button>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="card col-12 mt-5  pk-group ">
                                <h4 class="card-title m-2">Pengalaman Kerja</h4>
                                <div class="row m-4 g-3" data-index-pengalaman="0">
                                    <div class="col-sm-6">
                                        <label for="input_pengalaman_start_date_0" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="input_pengalaman_start_date_0" name="pengalaman[0][start_date]">
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input_pengalaman_end_date_0" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="input_pengalaman_end_date_0" name="pengalaman[0][end_date]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_nama_projek_0" class="form-label">Nama Proyek</label>
                                        <input type="text" class="form-control" id="input_pengalaman_nama_projek_0" name="pengalaman[0][nama_projek]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_lokasi_0" class="form-label">Lokasi Proyek</label>
                                        <input type="text" class="form-control" id="input_pengalaman_lokasi_0" name="pengalaman[0][lokasi]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_pengguna_0" class="form-label">Pengguna Barang/Jasa</label>
                                        <input type="text" class="form-control" id="input_pengalaman_pengguna_0" name="pengalaman[0][pengguna]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_perusahaan_0" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="input_pengalaman_perusahaan_0" name="pengalaman[0][perusahaan]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_job_des_0" class="form-label">Uraian Tugas</label>
                                        <textarea type="text" class="form-control" id="input_pengalaman_job_des_0" name="pengalaman[0][job_des]"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_posisi_0" class="form-label">Posisi</label>
                                        <input type="text" class="form-control" id="input_pengalaman_posisi_0" name="pengalaman[0][posisi]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_status_pekerja_0" class="form-label">Status Kepegawaian pada Perusahaan</label>
                                        <input type="text" class="form-control" id="input_pengalaman_status_pekerja_0" name="pengalaman[0][status_pekerja]">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_referensi_0" class="form-label">Surat Referensi dari Pengguna barang/jasa Tahun sebelumnya <Span class="text-muted">(Optional)</Span></label>
                                        <input type="text" class="form-control" id="input_pengalaman_referensi_0" name="pengalaman[0][referensi]">
                                    </div>
                                </div>
                            </div>
                            @endif
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
<script>
    function previewImg() {
        const doc = document.querySelector('#image');
        const docPreview = document.querySelector('.img-preview');

        docPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(doc.files[0]);

        oFReader.onload = function(oFREvent) {
            docPreview.src = oFREvent.target.result;
        }
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(e) {
        $('#button_add_sertivikat').on('click', function(e) {
            e.preventDefault();
            let indexSertifikat = 0;
            $('#list-Sertifikat').children().each(function() {
                let index = $(this).attr('data-index-sertifikat');
                if (index > indexSertifikat) {
                    indexSertifikat = index;
                }
            });
            indexSertifikat = Number(indexSertifikat) + 1;
            const newSertivikat = `
                <div data-index-sertivikat="${indexSertifikat}">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="input_sertivikat_nama_penyelengara_${indexSertifikat}" class="form-label">Peyelengara Sertifikat</label>
                            <input type="text" class="form-control" id="input_sertivikat_nama_penyelengara_${indexSertifikat}" name="sertivikat[${indexSertifikat}][nama_penyelengara]">
                        </div>

                        <div class="col-sm-2">
                            <label for="input_sertivikat_thn_start_${indexSertifikat}" class="form-label">Tahun Mulai</label>
                            <select class="form-control" id="input_sertivikat_thn_start_${indexSertifikat}" name="sertivikat[${indexSertifikat}][thn_start]">
                                <option value="">Please Select</option>
                                <?php
                                $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 1999; $x--) {
                                ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="input_sertivikat_thn_end_${indexSertifikat}" class="form-label">Tahun Berakhir</label>
                            <select class="form-control" id="input_sertivikat_thn_end_${indexSertifikat}" name="sertivikat[${indexSertifikat}][thn_end]">
                                <option value="">Please Select</option>
                                <?php
                                $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 1999; $x--) {
                                ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2 mt-4">
                            <button type="button" data-type="button_remove_sertivikat" data-index-Sertifikat="${indexSertifikat}" id="button_remove_sertivikat" class="btn btn-danger remove mt-2">Remove</button>
                        </div>
                    </div>
                    <div class="col-12 row">
                        <label for="input_sertivikat_file_serti_${indexSertifikat}">Ungah Sertifikat <span class="text-muted"></span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="input_sertivikat_file_serti_${indexSertifikat}" name="sertivikat[${indexSertifikat}][file_serti]" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                    </div>
                </div>   
            `;
            $('#list-Sertifikat').append(newSertivikat);
        });

        //event buttom remove
        $(document).on('click', "button[data-type='button_remove_sertivikat']", function(e) {
            e.preventDefault();
            let indexSertifikat = $(this).attr('data-index-Sertifikat');
            if ($('#list-Sertifikat').children().length !== 1) {
                $('div[data-index-Sertifikat="${indexSertifikat}"]').remove();
            }
        });
    });
</script>

<script>
    $(document).ready(function(e) {
        $('#button_add_pengalaman').on('click', function(e) {
            e.preventDefault();
            let indexPengalaman = 0;
            $('#list-pengalaman').children().each(function() {
                let index = $(this).attr('data-index-pengalaman');
                if (index > indexPengalaman) {
                    indexPengalaman = index;
                }
            });
            indexPengalaman = Number(indexPengalaman) + 1;
            const newPengalaman = `
            <div class="card col-12 mt-5">
                <h4 class="card-title m-2">Pengalaman Kerja</h4>
                <div class="row m-4 g-3" data-index-pengalaman="${indexPengalaman}">
                    <div class="col-sm-6">
                        <label for="input_pengalaman_start_date_${indexPengalaman}" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="input_pengalaman_start_date_${indexPengalaman}" name="pengalaman[${indexPengalaman}][start_date]">
                    </div>

                    <div class="col-sm-6">
                        <label for="input_pengalaman_end_date_${indexPengalaman}" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="input_pengalaman_end_date_${indexPengalaman}" name="pengalaman[${indexPengalaman}][end_date]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_nama_projek_${indexPengalaman}" class="form-label">Nama Proyek</label>
                        <input type="text" class="form-control" id="input_pengalaman_nama_projek_${indexPengalaman}" name="pengalaman[${indexPengalaman}][nama_projek]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_lokasi_${indexPengalaman}" class="form-label">Lokasi Proyek</label>
                        <input type="text" class="form-control" id="input_pengalaman_lokasi_${indexPengalaman}" name="pengalaman[${indexPengalaman}][lokasi]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_pengguna_${indexPengalaman}" class="form-label">Pengguna Barang/Jasa</label>
                        <input type="text" class="form-control" id="input_pengalaman_pengguna_${indexPengalaman}" name="pengalaman[${indexPengalaman}][pengguna]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_perusahaan_${indexPengalaman}" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="input_pengalaman_perusahaan_${indexPengalaman}" name="pengalaman[${indexPengalaman}][perusahaan]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_job_des_${indexPengalaman}" class="form-label">Uraian Tugas</label>
                        <textarea type="text" class="form-control" id="input_pengalaman_job_des_${indexPengalaman}" name="pengalaman[${indexPengalaman}][job_des]"></textarea>
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_posisi_${indexPengalaman}" class="form-label">Posisi</label>
                        <input type="text" class="form-control" id="input_pengalaman_posisi_${indexPengalaman}" name="pengalaman[${indexPengalaman}][posisi]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_status_pekerja_${indexPengalaman}" class="form-label">Status Kepegawaian pada Perusahaan</label>
                        <input type="text" class="form-control" id="input_pengalaman_status_pekerja_${indexPengalaman}" name="pengalaman[${indexPengalaman}][status_pekerja]">
                    </div>

                    <div class="col-12">
                        <label for="input_pengalaman_referensi_${indexPengalaman}" class="form-label">Surat Referensi dari Pengguna barang/jasa Tahun sebelumnya <Span class="text-muted">(Optional)</Span></label>
                        <input type="text" class="form-control" id="input_pengalaman_referensi_${indexPengalaman}" name="pengalaman[${indexPengalaman}][referensi]">
                    </div>
                    
                    <div class="col-8">
                        <button type="button" data-type="btn-remove" data-index-pengalaman="${indexPengalaman}" class="btn btn-danger mr-2">Remove</button>
                    </div>
                </div>
            </div>
            `;
            $('#list-pengalaman').append(newPengalaman);
        });

        //event buttom remove
        $(document).on('click', "button[data-type='btn-remove']", function(e) {
            e.preventDefault();
            let indexPengalaman = $(this).attr('data-index-pengalaman');
            if ($('#list-pengalaman').children().length !== 1) {
                $('div[data-index-pengalaman="${indexPengalaman}"]').remove();
            }
        });
    });
</script>

@endsection
@push('javascript-internal')

@endpush