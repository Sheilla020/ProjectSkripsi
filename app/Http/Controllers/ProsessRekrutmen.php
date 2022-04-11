<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Keputusan;
use App\Models\Kriteria;
use App\Models\Kualifikasi;
use App\Models\Posisi;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;
use Symfony\Component\Console\Input\Input;

class ProsessRekrutmen extends Controller
{
    // public function index()
    // {
    //     return view('keputusan.kriteria', [
    //         'keputusan' => Keputusan::all(),
    //         'kriteria' => Kriteria::all(),
    //         'posisi' => Posisi::all(),
    //         'divisi' => Divisi::all()
    //     ]);
    // }

    public function inputperbandingan(Request $request, Kriteria $kriteria)
    {
        $jumlah = $request->jumlah_kriteria;
        $k12 = $request->k12;
        $k13 = $request->k13;
        $k14 = $request->k14;
        $k15 = $request->k15;
        $k16 = $request->k16;
        $k23 = $request->k23;
        $k24 = $request->k24;
        $k25 = $request->k25;
        $k26 = $request->k26;
        $k34 = $request->k34;
        $k35 = $request->k35;
        $k36 = $request->k36;
        $k45 = $request->k45;
        $k46 = $request->k46;
        $k56 = $request->k56;

        $k21 = 1 / $k12;
        $k31 = 1 / $k13;
        $k32 = 1 / $k23;
        $k41 = 1 / $k14;
        $k42 = 1 / $k24;
        $k43 = 1 / $k34;
        $k51 = 1 / $k15;
        $k52 = 1 / $k25;
        $k53 = 1 / $k35;
        $k54 = 1 / $k45;
        $k61 = 1 / $k16;
        $k62 = 1 / $k26;
        $k63 = 1 / $k36;
        $k64 = 1 / $k46;
        $k65 = 1 / $k56;

        $k21 = number_format($k21, 2, '.', '');
        $k31 = number_format($k31, 2, '.', '');
        $k32 = number_format($k32, 2, '.', '');
        $k41 = number_format($k41, 2, '.', '');
        $k42 = number_format($k42, 2, '.', '');
        $k43 = number_format($k43, 2, '.', '');
        $k51 = number_format($k51, 2, '.', '');
        $k52 = number_format($k52, 2, '.', '');
        $k53 = number_format($k53, 2, '.', '');
        $k54 = number_format($k54, 2, '.', '');
        $k61 = number_format($k61, 2, '.', '');
        $k62 = number_format($k62, 2, '.', '');
        $k63 = number_format($k63, 2, '.', '');
        $k64 = number_format($k64, 2, '.', '');
        $k65 = number_format($k65, 2, '.', '');

        // $jumlahK1 = 1 + $k12 + $k13 + $k14 + $k15 + $k16;
        // $jumlahK2 = $k21 + 1 + $k23 + $k24 + $k25 + $k26;
        // $jumlahK3 = $k31 + $k32 + 1 + $k34 + $k35 + $k36;
        // $jumlahK4 = $k41 + $k42 + $k43 + 1 + $k45 + $k46;
        // $jumlahK5 = $k51 + $k52 + $k53 + $k54 + 1 + $k56;
        // $jumlahK6 = $k61 + $k62 + $k63 + $k64 + $k65 + 1;

        $jumlahK1 = 1 + $k21 + $k31 +
            +$k41 + $k51 + $k61;
    }

    function readSatu($a)
    {
        $query = "SELECT * FROM kriterias WHERE id='$a' LIMIT 0,1";
    }
}
