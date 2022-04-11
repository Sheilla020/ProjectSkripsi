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
                                            <label for="address" class="form-label">Posisi yang Diusulkan</label>
                                            <select class="form-control" name="profile_id_posisi" value="{{ old('profile_id_posisi') }}">
                                                @foreach ($posisi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="profile_full_name" value="{{ old('profile_full_name') }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="firstName" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="profile_tempat_lahir" value="{{ old('profile_tempat_lahir') }}">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="firstName" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="profile_tgl_lahir" value="{{ old('profile_tgl_lahir') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Pendidikan</label>
                                            <input type="text" class="form-control" name="profile_pendidikan" value="{{ old('profile_pendidikan') }}">
                                            <span class="text-muted">(pendidikan terakhir: Gelar, jurusan, Asal Instansi, tahun kelulusan</span>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address2" class="form-label">Pendidikan Non Formal</label>
                                            <input type="text" class="form-control" name="profile_non_formal" value="{{ old('profile_non_formal') }}">
                                        </div>

                                        <div class="col-12 mb-2">
                                            <label for="address" class="form-label">Penguasaan Bahasa Inggris</label>
                                            <input type="text" class="form-control" name="profile_bh_inggris" value="{{ old('profile_bh_inggris') }}">
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
                        <div id="list-pengalaman">
                            @if (old('pengalaman'))
                            @foreach (old('pengalaman') as $key => $pengalaman)
                            <div class="card col-12 mt-5  pk-group ">
                                <h4 class="card-title m-2">Pengalaman Kerja</h4>
                                <div class="row m-4 g-3" data-index-pengalaman="{{ $key }}">
                                    <div class="col-sm-6">
                                        <label for="input_pengalaman_start_date_{{ $key }}" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control {{ $errors->has("pengalaman.{$key}.start_date") ? 'is-invalid' : null }}" id="input_pengalaman_start_date_{{ $key }}" name="pengalaman[{{ key }}][start_date]" value="{{ $pengalaman['start_date'] }}">
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="input_pengalaman_end_date_{{ $key }}" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control {{ $errors->has("pengalaman.{$key}.end_date") ? 'is-invalid' : null }}" id="input_pengalaman_end_date_{{ $key }}" name="pengalaman[{{ key }}][end_date]" id="" value="{{ $pengalaman['end_date'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_nama_projek_{{ $key }}" class="form-label">Nama Proyek</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.nama_projek") ? 'is-invalid' : null }}" id="input_pengalaman_nama_projek_{{ $key }}" name="pengalaman[{{ key }}][nama_projek]" value="{{ $pengalaman['nama_projek'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_lokasi_{{ $key }}" class="form-label">Lokasi Proyek</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.lokasi") ? 'is-invalid' : null }}" id="input_pengalaman_lokasi_{{ $key }}" name="pengalaman[{{ key }}][lokasi]" value="{{ $pengalaman['lokasi'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_pengguna_{{ $key }}" class="form-label">Pengguna Barang/Jasa</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.pengguna") ? 'is-invalid' : null }}" id="input_pengalaman_pengguna_{{ $key }}" name="pengalaman[{{ key }}][pengguna]" value="{{ $pengalaman['pengguna'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_perusahaan_{{ $key }}" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.perusahaan") ? 'is-invalid' : null }}" id="input_pengalaman_perusahaan_{{ $key }}" name="pengalaman[{{ key }}][perusahaan]" value="{{ $pengalaman['perusahaan'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_job_des_{{ $key }}" class="form-label">Uraian Tugas</label>
                                        <textarea type="text" class="form-control {{ $errors->has("pengalaman.{$key}.job_des") ? 'is-invalid' : null }}" id="input_pengalaman_job_des_{{ $key }}" name="pengalaman[{{ key }}][job_des]" value="{{ $pengalaman['job_des'] }}"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_posisi_{{ $key }}" class="form-label">Posisi</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.posisi") ? 'is-invalid' : null }}" id="input_pengalaman_posisi_{{ $key }}" name="pengalaman[{{ key }}][posisi]" value="{{ $pengalaman['posisi'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_status_pekerja_{{ $key }}" class="form-label">Status Kepegawaian pada Perusahaan</label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.status_pekerja") ? 'is-invalid' : null }}" id="input_pengalaman_status_pekerja_{{ $key }}" name="pengalaman[{{ key }}][status_pekerja]" value="{{ $pengalaman['status_pekerja'] }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="input_pengalaman_referensi_{{ $key }}" class="form-label">Surat Referensi dari Pengguna barang/jasa Tahun sebelumnya <Span class="text-muted">(Optional)</Span></label>
                                        <input type="text" class="form-control {{ $errors->has("pengalaman.{$key}.referensi") ? 'is-invalid' : null }}" id="input_pengalaman_referensi_{{ $key }}" name="pengalaman[{{ key }}][referensi]" value="{{ $pengalaman['referensi'] }}">
                                    </div>
                                </div>
                                <div class="col-8"><a class="btn btn-danger m-2 mt-" data-type="btn-remove">Remove</a></div>
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

<script>
    const add = document.querySelectorAll(".input-group .button_add_pengalaman")
    add.forEach(function(e) {
        e.addEventListener('click', function() {
            let element = this.parentElement
            let newElement = document.createElement('div')
            newElement.classList.add('input-group', 'mb-3')
            newElement.innerHTML = `
            <div class="card col-12 mt-5">
                <h4 class="card-title m-2">Pengalaman Kerja</h4>
                <div class="row m-4 g-3" data-index-pengalaman="${indexPengalaman}">
                    <div class="col-sm-6">
                        <label for="input_pengalaman_start_date_${indexPengalaman}" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="input_pengalaman_start_date_${indexPengalaman}" name="pengalaman[${indexPengalaman}][start_date]">
                    </div>

                    <div class="col-sm-6">
                        <label for="input_pengalaman_end_date_${indexPengalaman}" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-cont ol" id="input_pengalaman_end_date_${indexPengalaman}" name="pengalaman[${indexPengalaman}][end_date]">
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
                </div>
                <div class="col-8">
                    <a class="btn btn-primary mt-2" data-type="btn-remove" data-index-pengalaman="${indexPengalaman}">Remove</a>
                </div>
            </div>
            `
            document.getElementById('extra-phone').appendChild(newElemenr)

            callEvent()
        })
    })
    callEvent()

    function callEvenet() {
        documenet.querySelctor('from').querySelectorAll('.remove_phone').forEach(function(remove) {
                remove.addEventListener('click', function(elmClick) {
                        elmClick.target.parentElement.remove()
                    }
                })
        }
</script>
@endsection
@push('javascript-internal')

@endpush