<?php

namespace App\Http\Controllers;

use App\Models\DetailProfile;
use App\Models\Divisi;
use App\Models\Keputusan;
use App\Models\Kriteria;
use App\Models\PengalamanKerja;
use App\Models\Posisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = DetailProfile::with(['pengalaman'])->get();
        return view('dashboard', [
            'divisi' => Divisi::all(),
            'posisi' => Posisi::all(),
            'keputusan' =>  Keputusan::all(),
            'profile' => $profile
        ]);
    }

    public function createCV()
    {
        $pengalaman = [];
        return view('addcv', [
            'divisi' => Divisi::all(),
            'posisi' => Posisi::all(),
            'profile' => DetailProfile::all(),
            'keputusan' =>  Keputusan::all(),
            'pengalaman' => $pengalaman
        ]);
    }

    public function keputusan(Keputusan $keputusan)
    {
        return view('keputusan.kriteria', [
            'title' => $keputusan->kriteria,
            'kriteria' => $keputusan->kriteria,
            $keputusan = Keputusan::all(),
            'keputusan' => $keputusan,
            'kriteria' => Kriteria::all(),
            'divisi' => Divisi::all(),
            'posisi' => Posisi::all(),
            'profile' => DetailProfile::all(),
        ]);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'stall_name' => 'required|string',
    //         'stall_address' => 'required|string',
    //         'schedules.*.name' => 'required|string',
    //         'schedules.*.open' => 'required|string',
    //         'schedules.*.close' => 'required|string',
    //     ], [], [
    //         'stall_name' => 'stall name',
    //         'stall_address' => 'stall address',
    //         'schedules.*.name' => 'schedule name',
    //         'schedules.*.close' => 'schedule close',
    //         'schedules.*.open' => 'schedule open',
    //     ]);
    //     DB::beginTransaction();
    //     try {
    //         $stall = Stall::create([
    //             'name' => $request->stall_name,
    //             'address' => $request->stall_address,
    //         ]);
    //         $stall->schedules()->createMany($this->setFieldSchedules($request));
    //         return redirect()->route('stalls.index');
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         dd("Create failed:" . $th->getMessage());
    //     } finally {
    //         DB::commit();
    //     }
    // }
}
