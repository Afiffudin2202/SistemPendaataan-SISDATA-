<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id';
    protected $fillable = [ 'id_institusi', 'nama_divisi'];

    /**
     * Get the institusi that owns the Divisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institusi(): BelongsTo
    {
        return $this->belongsTo(Institusi::class, 'id_institusi', 'id');
    }
    

    /**
     * Get all of the staff for the Divisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
