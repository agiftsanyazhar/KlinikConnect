<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    protected $guarded = ["id"];

    /**
     * Get the user that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the specialization that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }

    /**
     * Get all of the doctorSchedule for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctorSchedule(): HasMany
    {
        return $this->hasMany(DoctorSchedule::class);
    }

    /**
     * Get all of the testimonial for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctorTestimonial(): HasMany
    {
        return $this->hasMany(DoctorTestimonial::class);
    }

    /**
     * Calculate the average rating for the doctor
     *
     * @return float
     */
    public function averageRating()
    {
        return $this->doctorTestimonial()->avg('rating');
    }

    /**
     * Get all of the appointment for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
