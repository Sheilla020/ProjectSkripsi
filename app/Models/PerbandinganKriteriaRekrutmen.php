<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganKriteriaRekrutmen extends Model
{
    use HasFactory;

    public function Kriteria(){
        return $this->belongsTo(KriteriaRekrutmen::class, 'id');
    }
   
}
