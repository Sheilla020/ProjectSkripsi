<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaNormalization extends Model
{
    use HasFactory;
    protected $fillable = ['comparison_id', 'value'];

    public function comparisons() {
        return $this->belongsTo(KriteriaComparison::class, 'id');
    }

}
