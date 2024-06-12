<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory, HasUuids;
    protected  $primaryKey = 'id';
    protected $guarded = ['id'];

    /**
     * Get the divisi that owns the Staff
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id');
    }

}
