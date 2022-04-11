<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProfile extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'full_name',
        'tempat_lahir',
        'tgl_lahir',
        'pendidikan',
        'non_formal',
        'bh_inggris',
        'id_posisi',
        'image'
    ];

    public function pengalaman()
    {
        return $this->hasMany(PengalamanKerja::class);
    }



    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi');
    }
}
