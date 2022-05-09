<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPrioritie extends Model
{
    use HasFactory;
    protected $fillable = ['kriteria_id', 'prioritie'];

}
