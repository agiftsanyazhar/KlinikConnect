<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $guarded = ["id"];

    /**
     * Get the doctor that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get the patient that owns the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get all of the prescription for the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescription(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }

    /**
     * Get all of the paymentRecord for the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentRecord(): HasMany
    {
        return $this->hasMany(PaymentRecord::class);
    }
}
