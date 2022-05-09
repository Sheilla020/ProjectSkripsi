<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Kriteria;
use App\Models\KriteriaComparison;
use App\Models\KriteriaNormalization;
use App\Models\KriteriaPrioritie;
use App\Models\Posisi;
use App\Models\RatingScale;
use Illuminate\Http\Request;
use mysqli_result;

use function PHPUnit\Framework\callback;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keputusan.kriteria', [
            'rating' => RatingScale::all(),
            'comparison' => KriteriaComparison::all(),
            'prioritie' => KriteriaPrioritie::all(),
            'kriteria' => Kriteria::all(),
            'countKriteria' => Kriteria::count(),
            'posisi' => Posisi::all(),
            'divisi' => Divisi::all()
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
            'comparison.*.first_kriteria_id' => 'required|integer',
            'comparison.*.second_kriteria_id' => 'required|integer',
            'comparison.*.nilai' => 'required',
        ], [],[
            'comparison.*.first_kriteria_id' => 'comparison first_kriteria_id',
            'comparison.*.second_kriteria_id' => 'comparison second_kriteria_id',
            'comparison.*.nilai' => 'comparison nilai',
        ]);
    
        $comparisons = [];
        foreach($request->comparison as  $comparison){
            $comparisons[] = [
            $firstkriteria = $comparison['first_kriteria_id'],
            $secondkriteria = $comparison['second_kriteria_id'],
            $nilai = $comparison['nilai']
            ];
            if ($firstkriteria == $secondkriteria) {
                $comparison = KriteriaComparison::updateOrCreate(
                    ['first_kriteria_id' => $firstkriteria, 'second_kriteria_id' => $secondkriteria],
                    ['nilai' => 1]
                );
            } else {
                $comparison = KriteriaComparison::updateOrCreate(
                    ['first_kriteria_id' => $firstkriteria, 'second_kriteria_id' => $secondkriteria],
                    ['nilai' => $nilai]
                );
                $invers = KriteriaComparison::updateOrCreate(
                    ['first_kriteria_id' => $secondkriteria, 'second_kriteria_id' => $firstkriteria],
                    ['nilai' => 1 / $nilai]
                );
            }
            $kriterias = Kriteria::orderBy('code', 'asc')->get();
            $normalizations = [];
            foreach ($kriterias as $kriteria) {
                $total = $kriteria->comparisonsY->sum('nilai');
                foreach ($kriteria->comparisonsY as $comparison) {
                    $normalizations[] = [
                        $c_id = $comparison['id'],
                        $C_nilai = $comparison['nilai']
                    ];
                    $normalization = KriteriaNormalization::updateOrCreate(
                        ['comparison_id' =>  $c_id],
                        ['value' => round($C_nilai/ $total, 4)]
                        
                    );
                }
            }
            $prioties = [];
            foreach ($kriterias as $kriteria) {
                $prioties[] = [
                    $p_id = $kriteria['id'],
                    $p_value = $kriteria->comparisonsX->avg('normalization_value'),
                ];
                $pv = KriteriaPrioritie::updateOrCreate(
                    ['kriteria_id' =>  $p_id],
                    ['prioritie' =>  $p_value]
                );
            }
        }
        
        return redirect()->route('kriteria.index');
    }

    public function result(){
        $kriterias = Kriteria::orderBy('code', 'asc')->get();
        $normalizations = [];
        foreach ($kriterias as $kriteria) {
            $total = $kriteria->comparisonsY->sum('nilai');
            foreach ($kriteria->comparisonsY as $comparison) {
                $normalizations[] = [
                    $c_id = $comparison['id'],
                    $C_nilai = $comparison['nilai']
                 ];
                $normalization = KriteriaNormalization::updateOrCreate(
                    ['comparison_id' =>  $c_id],
                    ['value' => round($C_nilai/ $total, 4)]
                    
                );
            }
        }
        
        foreach ($kriterias as $kriteria) { 
            $pv = KriteriaPrioritie::updateOrCreate(
                ['kriteria_id' => $kriteria->id],
                ['value' => $kriteria->comparisonsX->avg('normalization_value')]
            );
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        //
    }
}
