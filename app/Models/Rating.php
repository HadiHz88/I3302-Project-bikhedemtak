<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'provider_id', 'rated_by', 'rating', 'review'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function ratedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rated_by');
    }


    protected static function booted()
    {
        // Update the provider's average rating after a rating is saved
        static::saved(function ($rating) {
            $rating->provider->updateAverageRating();
        });

        // Update the provider's average rating after a rating is deleted
        static::deleted(function ($rating) {
            $rating->provider->updateAverageRating();
        });
    }
}
