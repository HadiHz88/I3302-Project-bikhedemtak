<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
;

class ServiceRequest extends Model
{
    use HasFactory;
    
    
 protected $fillable = ['provider_id', 'title', 'salary', 'location', 'schedule'];

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => strtolower($name)]);

        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}