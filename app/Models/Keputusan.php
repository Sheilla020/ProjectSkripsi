<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'keputusan_id ');
    }
}
