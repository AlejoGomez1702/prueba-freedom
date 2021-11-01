<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    use HasFactory;

    /**
     * Get the animals for the corral.
     */
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
