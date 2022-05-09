<?php

namespace App\Http\Controllers;

use App\Models\KriteriaComparison;
use App\Models\KriteriaNormalization;
use App\Models\KriteriaPrioritie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $kon = mysqli_connect("localhost", "root", "", "projek_cvsena");
        $result = mysqli_query($kon, 'SELECT * FROM kriterias');

        $kriteria = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $kriteria[] = $row;
        }

        $n = count($kriteria);

        // buat matriks nilai perbandingan kriteria yang diinputkan
        $urut = 0;
        $matriks = [];

        for ($x = 0; $x <= $n - 2; $x++) {
            for ($y = $x + 1; $y <= $n - 1; $y++) {
                $urut++;
                $perbandingan = 'perbandingan' . $urut;
                $nilai = 'nilai' . $urut;

                if ($_POST[$perbandingan] == 1) {
                    $matriks[$x][$y] = $_POST[$nilai];
                    $matriks[$y][$x] = 1 / $_POST[$nilai];
                } else {
                    $matriks[$x][$y] = 1 / $_POST[$nilai];
                    $matriks[$y][$x] = $_POST[$nilai];
                }

                $id_kriteria1 = $kriteria[$x]['id'];
                $id_kriteria2 = $kriteria[$y]['id'];

                // apakah nilai perbandingan dari dua kriteria yg diinputkan sudah ada di database ?
                // jika belum, maka input baris baru
                // jika sudah, maka update nilainya

                $query = "SELECT * FROM kriteria_comparisons WHERE
                            first_kriteria_id = $id_kriteria1 AND
                            second_kriteria_id = $id_kriteria2";
                $result = mysqli_query($kon, $query);
                $comparison = KriteriaComparison::updateOrCreate(
                ['first_kriteria_id' => $id_kriteria1, 'second_kriteria_id' => $id_kriteria2],
                ['nilai' => $matriks[$x][$y] ]);
                   
                return $comparison;
            }
        }
        $kriterias = Kriteria::orderBy('code', 'asc')->get();

        foreach ($kriterias as $kriteria) {
            $total = $kriteria->comparisonsY->sum('nilai');
            foreach ($kriteria->comparisonsY as $comparison) {
                $normalization = KriteriaNormalization::updateOrCreate(
                    ['comparison_id' => $comparison->id],
                    ['value' => round($comparison->value / $total, 4)]
                );
            }
        }
        foreach ($kriterias as $kriteria) {
            $pv = KriteriaPrioritie::updateOrCreate(
                ['kriteria_id' => $kriteria->id],
                ['value' => $kriteria->comparisonsX->avg('normalization_value')]
            );
        }
        return  $normalization;
        return $pv;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KriteriaComparison  $kriteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function show(KriteriaComparison $kriteriaComparison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KriteriaComparison  $kriteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function edit(KriteriaComparison $kriteriaComparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KriteriaComparison  $kriteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaComparison $kriteriaComparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KriteriaComparison  $kriteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaComparison $kriteriaComparison)
    {
        //
    }
}
