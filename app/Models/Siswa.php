<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    protected $fillable = [
        'id_ku',
        'nama_lengkap',
        'nama_panggilan',
        'tpt_lahir',
        'tgl_lahir',
        'nama_ayah',
        'nama_ibu',
        'asal_sekolah',
        'alamat',
        'agama',
        'status'
    ];

    /**
     * Get the kuu that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kuu(): BelongsTo
    {
        return $this->belongsTo(Ku_usia::class, 'id_ku', 'id');
    }
}
