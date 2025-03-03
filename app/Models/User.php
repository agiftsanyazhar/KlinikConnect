<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'phone',
        'address',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the doctor associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctor(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    /**
     * Get the patient associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patient(): HasMany
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Get all of the notification for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
