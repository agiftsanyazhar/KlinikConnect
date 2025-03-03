<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialization extends Model
{
    /** @use HasFactory<\Database\Factories\SpecializationFactory> */
    use HasFactory;

    protected $guarded = ["id"];

    /**
     * Get all of the doctor for the specialization
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctor(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
