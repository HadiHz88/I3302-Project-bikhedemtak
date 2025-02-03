<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role', // 'service_seeker' or 'service_provider'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the service requests made by the user (if they are a seeker).
     */
    public function serviceRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class, 'user_id');
    }

    /**
     * Get the service offers made by the user (if they are a provider).
     */
    public function serviceOffers(): HasMany
    {
        return $this->hasMany(ServiceOffer::class, 'provider_id');
    }

    /**
     * Get the ratings the user has given.
     */
    public function givenRatings(): HasMany
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    /**
     * Get the ratings the user has received.
     */
    public function receivedRatings(): HasMany
    {
        return $this->hasMany(Rating::class, 'provider_id');
    }
}