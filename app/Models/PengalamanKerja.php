<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'start_date',
        'end_date',
        'nama_projek',
        'lokasi',
        'pengguna',
        'perusahaan',
        'job_des',
        'posisi',
        'status_pekerja',
        'referensi',
    ];

    public function profile()
    {
        return $this->belongsTo(DetailProfile::class);
    }
}
