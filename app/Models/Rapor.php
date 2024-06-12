<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rapor extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_periode', 'id_siswa', 'passing',
        'shooting',
        'dribling',
        'control',
        'intercept',
        'heading',
        'leadership',
        'attitude',
        'communication',
        'notes'
    ];


    /**
     * Get the siswa that owns the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    /**
     * Get the periode that owns the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }
}
