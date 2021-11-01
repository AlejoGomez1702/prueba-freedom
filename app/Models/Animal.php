<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    /**
     * Get the corral that owns the animal.
     */
    public function corral()
    {
        return $this->belongsTo(Corral::class);
    }
}
