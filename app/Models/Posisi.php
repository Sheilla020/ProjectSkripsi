<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    public function profile()
    {
        return $this->hasMany(DetailProfile::class, 'id_posisi');
    }

    public function kualifikasi()
    {
        return $this->hasMany(Kualifikasi::class, 'id_posisi');
    }
}
