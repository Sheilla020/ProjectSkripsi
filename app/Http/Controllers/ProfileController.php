<?php

namespace App\Http\Controllers;

use App\Models\DetailProfile;
use App\Models\Divisi;
use App\Models\Keputusan;
use App\Models\Posisi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addcv', [
            'posisi' => Posisi::all(),
            'divisi' => Divisi::all(),
            'keputusan' => Keputusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'filektp' => 'required|file|mimes:jpeg,png,jpg,svg,pdf|max:2048',
            'fileijz' => 'required|file|mimes:jpeg,png,jpg,svg,pdf|max:2048',
            'filecv' => 'required|file|mimes:jpeg,png,jpg,svg,pdf|max:2048',
        ]);

        $imagename = $request->image->getClientOriginalName();
        $request->image->move(public_path('stored'), $imagename);

        $filektp = $request->filektp->getClientOriginalName();
        $request->filektp->move(public_path('ktp'), $filektp);

        $fileijz = $request->fileijz->getClientOriginalName();
        $request->fileijz->move(public_path('ijazah'), $fileijz);

        $filecv = $request->filecv->getClientOriginalName();
        $request->filecv->move(public_path('cv'), $filecv);


        $this->validate($request, [
            'profile_full_name' => 'required|string',
            'profile_tempat_lahir' => 'required|string',
            'profile_tgl_lahir' => 'required|string',
            'profile_gander' => 'required|string',
            'profile_tingkat_pendidikan' => 'required|string',
            'profile_jurusan_pendidikan' => 'required|string',
            'profile_asal_Instansi' => 'required|string',
            'profile_thn_kelulusan' => 'required|string',
            'profile_non_formal' => 'required|string',
            'profile_bh_inggris' => 'required|string',
            'profile_pengalaman_bekerja' => 'required|string',
            'profile_gaji' => 'required|string',
            'profile_pengalaman_oil_gas' => 'required|string',
            'profile_nama_perusahaan' => 'required|string',
            'profile_Keterangan' => 'required|string',
            'profile_nik_ktp' => 'required|string',
            'profile_no_npwp' => 'required|string',
            'profile_id_posisi' => 'required|string',
            'pengalaman.*.start_date' => 'required|string',
            'pengalaman.*.end_date' => 'required|string',
            'pengalaman.*.nama_projek'  => 'required|string',
            'pengalaman.*.lokasi'  => 'required|string',
            'pengalaman.*.pengguna'  => 'required|string',
            'pengalaman.*.perusahaan'  => 'required|string',
            'pengalaman.*.job_des'  => 'required|string',
            'pengalaman.*.posisi'  => 'required|string',
            'pengalaman.*.status_pekerja'  => 'required|string',
            'pengalaman.*.referensi'  => 'required|string',
        ], [], [
            'profile_id_posisi' => 'profile id_posisi',
            'profile_full_name' => 'profile full_name',
            'profile_tempat_lahir' => 'profile tempat_lahir',
            'profile_tgl_lahir' => 'profile tgl_lahir',
            'profile_gander' => 'profile gander',
            'profile_tingkat_pendidikan' => 'profile tingkat_pendidikan',
            'profile_jurusan_pendidikan' => 'profile jurusan_pendidikan',
            'profile_asal_Instansi' => 'profile asal_Instansi',
            'profile_thn_kelulusan' => 'profile thn_kelulusan',
            'profile_non_formal' => 'profile non_formal',
            'profile_bh_inggris' => 'profile bh_inggris',
            'profile_pengalaman_bekerja' => 'profile_pengalaman_bekerja',
            'profile_gaji' => 'profile_gaji',
            'profile_pengalaman_oil_gas' => 'profile_pengalaman_oil_gas',
            'profile_nama_perusahaan' => 'profile_nama_perusahaan',
            'profile_keterangan' => 'profile_keterangan',
            'profile_nik_ktp' => 'profile_nik_ktp',
            'profile_no_npwp' => 'profile_no_npwp',
            'pengalaman.*.start_date' => 'pengalaman start_date',
            'pengalaman.*.end_date' => 'pengalaman end_date',
            'pengalaman.*.nama_projek' => 'pengalaman nama_projek',
            'pengalaman.*.lokasi' => 'pengalaman lokasi',
            'pengalaman.*.pengguna' => 'pengalaman pengguna',
            'pengalaman.*.perusahaan' => 'pengalaman perusahaan',
            'pengalaman.*.job_des' => 'pengalaman job_des',
            'pengalaman.*.posisi' => 'pengalaman posisi',
            'pengalaman.*.status_pekerja' => 'pengalaman status_pekerja',
            'pengalaman.*.referensi' => 'pengalaman referensi',
        ]);
        DB::beginTransaction();
        try {
            $profile = DetailProfile::create([
                'id_posisi' => $request->profile_id_posisi,
                'full_name' => $request->profile_full_name,
                'tempat_lahir' => $request->profile_tempat_lahir,
                'tgl_lahir' => $request->profile_tgl_lahir,
                'pendidikan' => $request->profile_pendidikan,
                'non_formal' => $request->profile_non_formal,
                'bh_inggris' => $request->profile_bh_inggris,
                'gander' => $request->profile_gander,
                'tingkat_pendidikan' => $request->profile_tingkat_pendidikan,
                'jurusan_pendidikan' => $request->profile_jurusan_pendidikan,
                'asal_Instansi' => $request->profile_asal_Instansi,
                'thn_kelulusan' => $request->profile_thn_kelulusan,
                'pengalaman_bekerja' => $request->profile_pengalaman_bekerja,
                'gaji' => $request->profile_gaji,
                'pengalaman_oil_gas' => $request->profile_pengalaman_oil_gas,
                'nama_perusahaan' => $request->profile_nama_perusahaan,
                'Keterangan' => $request->profile_Keterangan,
                'image' => $imagename,
                'filektp' => $filektp,
                'fileijz' => $fileijz,
                'fileijz' => $filecv,
            ]);
            $profile->pengalaman()->createMany($this->setFieldPengalaman($request));
           return redirect()->route('profile.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd("Create faild:" . $th->getMessage());
        } finally {
            DB::commit();
        }
    }

    private function setFieldPengalaman(Request $request)
    {
        $pengalamans = [];
        foreach ($request->pengalaman as  $pengalaman) {
            $pengalamans[] = [
                'start_date' => $pengalaman['start_date'],
                'end_date' => $pengalaman['end_date'],
                'nama_projek' => $pengalaman['nama_projek'],
                'lokasi' => $pengalaman['lokasi'],
                'pengguna' => $pengalaman['pengguna'],
                'perusahaan' => $pengalaman['perusahaan'],
                'job_des' => $pengalaman['job_des'],
                'posisi' => $pengalaman['posisi'],
                'status_pekerja' => $pengalaman['status_pekerja'],
                'referensi' => $pengalaman['referensi'],
            ];
        }
        return $pengalamans;
    }

    private function setFieldSertifikat(Request $request)
    {
        $request->validate([
            'file_serti' => 'required|file|mimes:jpeg,png,jpg,gif,svg,xlsx,docx,pdf|max:2048',
        ]);

        $fileserti = $request->file_serti->getClientOriginalName();
        $request->file_serti->move(public_path('sertifikat'), $fileserti);

        $sertifikats = [];
        foreach ($request->sertifikat as  $sertifikat) {
            $sertifikats[] = [
                'nama_penyelengara' => $sertifikat['nama_penyelengara'],
                'thn_start' => $sertifikat['thn_start'],
                'thn_end' => $sertifikat[$fileserti],
                'file_serti' => $sertifikat['file_serti']
            ];
        }
        return $sertifikats;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProfile  $detailProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = DetailProfile::find($id);
        return view('profile.show', compact('profile'), [
            'divisi' => Divisi::all(),
            'posisi' => Posisi::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProfile  $detailProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProfile $detailProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailProfile  $detailProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailProfile $detailProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailProfile  $detailProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProfile $detailProfile)
    {
        //
    }
}
