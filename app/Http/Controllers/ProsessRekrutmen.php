<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Keputusan;
use App\Models\Kriteria;
use App\Models\KriteriaComparison;
use App\Models\Posisi;
use App\Models\RatingScale;

class ProsessRekrutmen extends Controller
{
    public function index()
    {
        return view('keputusan.kriteria', [
            'keputusan' => Keputusan::all(),
            'comparison' => KriteriaComparison::all(),
            'kriteria' => Kriteria::all(),
            'rating' => RatingScale::all(),
            'posisi' => Posisi::all(),
            'divisi' => Divisi::all()
        ]);
    }

   

}
