<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaComparison extends Model
{
    use HasFactory;
    protected $fillable = ['first_kriteria_id', 'nilai', 'second_kriteria_id'];
    protected $appends = ['normalization_value'];

    public function getNormalizationValueAttribute() {
        return $this->attributes['normalization_value'] = $this->normalization->value ?? 0;
    }

    public function firstkriteria() {
        return $this->belongsTo(Kriteria::class, 'first_kriteria_id')->withTrashed();
    }

    public function secondkriteria() {
        return $this->belongsTo(Kriteria::class, 'second_kriteria_id')->withTrashed();
    }

    public function normalization() {
        return $this->hasOne(kriteriaNormalization::class, 'comparison_id');
    }



}
