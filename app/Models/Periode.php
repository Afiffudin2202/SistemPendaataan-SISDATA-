<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periode extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    protected $guarded = [];

    /**
     * Get all of the rapor for the Periode
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapor(): HasMany
    {
        return $this->hasMany(Rapor::class);
    }
}
