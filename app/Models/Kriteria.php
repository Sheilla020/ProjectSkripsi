<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'nama_kriteria'];
    

    public function comparisons(){
        return $this->hasMany(KriteriaComparison::class, 'first_kriteria_id')->orderBy('second_kriteria_id', 'asc');
    }
    
    public function comparisonsX() {
        return $this->hasMany(KriteriaComparison::class, 'first_kriteria_id')->orderBy('second_kriteria_id', 'asc');
    }

    public function comparisonsY() {
        return $this->hasMany(KriteriaComparison::class, 'second_kriteria_id');
    }

    public function priority(){
        return $this->hasOne(KriteriaPrioritie::class);
    }

    
}
