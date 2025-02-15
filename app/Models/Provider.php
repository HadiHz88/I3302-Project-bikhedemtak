<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'phone',
        'description',
        'rating',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('images/default_provider_logo.jpg');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Update the provider's average rating
     */
    public function updateAverageRating(): void
    {
        $avgRating = $this->ratings()->avg('rating') ?? 0;
        $this->rating = round($avgRating, 1);
        $this->save();
    }
}
