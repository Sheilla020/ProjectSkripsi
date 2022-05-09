<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaRekrutmen extends Model
{
    use HasFactory;

    public function KriteriaPertama(){
        return $this->hasMany(PerbandinganKriteriaRekrutmen::class, 'kriteria_pertama');
    }

    public function KriteriaKedua(){
        return $this->hasMany(PerbandinganKriteriaRekrutmen::class, 'kriteria_kedua');
    }

    function readSatu($a){
        $query = "SELECT * FROM kriteria_rekrutmen WHERE id='$a' LIMIT 0,1";
        $stmt = $this->prepare($query);

        return $stmt;
    }
}
