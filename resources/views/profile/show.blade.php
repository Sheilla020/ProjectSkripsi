@extends('layouts.template')
@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Personal</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-12 d-flex ">
                        <div class="col-10">
                            <div class="border col-12 d-flex">
                                <div class="col-1 text-center">1</div>
                                <div class="m-1"></div>
                                <div class="col-3">Posisi yang diusulkan</div>
                                <div class="col-1">:</div>
                                <div class="col-12 ">{{ $profile->posisi->nama }}</div>
                            </div>
                            <div class="border col-12 d-flex">
                                <div class="col-1 text-center">2</div>
                                <div class="m-1"></div>
                                <div class="col-3">Nama Perusahaan</div>
                                <div class="col-1">:</div>
                                <div class="col-3">PT Solusi Engery Nusantara</div>
                            </div>
                            <div class="border col-12  d-flex">
                                <div class="col-1 text-center">3</div>
                                <div class="m-1"></div>
                                <div class="col-3">Nama Personil</div>
                                <div class="col-1">:</div>
                                <div class="col-3">{{ $profile->full_name }}</div>
                            </div>
                            <div class="border col-12 d-flex">
                                <div class="col-1 text-center">4</div>
                                <div class="m-1"></div>
                                <div class="col-3">Tempat/Taggal Lahir</div>
                                <div class="col-1">:</div>
                                <div class="col-3">{{ $profile->tempat_lahir }}, {{ $profile->tgl_lahir }}</div>
                            </div>
                            <div class="border h-auto col-12 d-flex">
                                <div class="col-1 text-center">5</div>
                                <div class="m-1"></div>
                                <div class="col-3">Pendidikan (Lembaga Pendidikan, tempat dan tahun tamat belajar, dilampirkan fotocopy ijazah)</div>
                                <div class="col-1 text-center">:</div>
                                <div class="col-5">{{ $profile->pendidikan }}</div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="col-12 text-center border">
                                <img src="/stored/{{ $profile->image }}" width="75%" alt="profile" class="img-preview border " />
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-12 m-0">
                            <div class="border col-12 d-flex">
                                <div class="col-1 text-center">6</div>
                                <div class="col-3">Pendidikan Non Formal</div>
                                <div class="col-1">:</div>
                                <div class="col-5">Cras elementum at neque feugiat efficitur. Pellentesque eget ornare leo, nec aliquam est.
                                    Fusce posuere maximus tempus. Cras in ante in enim suscipit bibendum quis nec diam.</div>
                            </div>
                            <div class="border col-12 d-flex">
                                <div class="col-1 text-center">7</div>
                                <div class="col-3">Penguasaan Bahasa Inggris</div>
                                <div class="col-1">:</div>
                                <div class="col-5">{{ $profile->bh_inggris }}</div>
                            </div>
                            <?php $no = 8 ?>
                            @foreach ($profile->pengalaman as $pengalaman)
                            <div class="border">
                                <div class=" col-12 d-flex">
                                    <div class="col-1 text-center"><?php echo $no++ ?></div>
                                    <div class="col-12">Pengalaman Kerja</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1 "></div>
                                    <div class="col-1 text-start">a</div>
                                    <div class="col-3">Waktu Pelaksanaan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3">{{ $pengalaman->start_date }} - {{ $pengalaman->end_date }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">b</div>
                                    <div class="col-3 ">Nama Proyek</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 ">{{ $pengalaman->nama_projek }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">c</div>
                                    <div class="col-3 ">Lokasi Proyek</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 ">{{ $pengalaman->lokasi }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">d</div>
                                    <div class="col-3 ">Penggunan Jasa/Barang</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 ">{{ $pengalaman->pengguna }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">e</div>
                                    <div class="col-3">Perusahaan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3">{{ $pengalaman->perusahaan }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">f</div>
                                    <div class="col-3">Uraian Tugas</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3">{{ $pengalaman->job_des }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">f</div>
                                    <div class="col-3">Posisi Penugasan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3">{{ $pengalaman->posisi }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">g</div>
                                    <div class="col-3">Status Kepegawaian Pada Perusahaan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 ">{{ $pengalaman->status_pekerja }}</div>
                                </div>
                                <div class=" col-12 d-flex">
                                    <div class="col-1"></div>
                                    <div class="col-1">h</div>
                                    <div class="col-3">Surat Referensi dari Pengguna barang/jasa Tahun Sebelumnya</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3">{{ $pengalaman->referensi }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </table>
</div>
@endsection