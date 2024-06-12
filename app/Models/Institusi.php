<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institusi extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['nama_institusi', 'alamat', 'no_tlp', 'email', 'instagram', 'tiktok', 'nama_pimpinan'];

    /**
     * Get all of the divisi for the Institusi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisi(): HasMany
    {
        return $this->hasMany(Divisi::class);
    }
}
