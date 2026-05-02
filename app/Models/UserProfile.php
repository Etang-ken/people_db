<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'payload'];

    protected $casts = [
        'payload' => 'array',
    ];

    public function scopeSearchByName(Builder $query, string $value): Builder
    {
        return $query->whereRaw('LOWER(name) = ?', [strtolower($value)]);
    }

    public function scopeSearchByEmail(Builder $query, string $value): Builder
    {
        return $query->whereRaw(
            "JSON_SEARCH(LOWER(payload), 'one', LOWER(?), NULL, '$.emails[*].email') IS NOT NULL",
            [$value]
        );
    }

    public function scopeSearchByPhone(Builder $query, string $value): Builder
    {
        return $query->whereRaw(
            "JSON_SEARCH(LOWER(payload), 'one', LOWER(?), NULL, '$.phone_numbers[*].number') IS NOT NULL",
            [$value]
        );
    }

    public function scopeFilterByLocation(Builder $query, string $location): Builder
    {
        return $query->whereRaw(
            "JSON_SEARCH(LOWER(payload), 'one', LOWER(?), NULL, '$.addresses[*].location') IS NOT NULL",
            [$location]
        );
    }

    public function getPrimaryEmailAttribute(): ?string
    {
        return $this->payload['emails'][0]['email'] ?? null;
    }

    public function getPrimaryPhoneAttribute(): ?string
    {
        return $this->payload['phone_numbers'][0]['number'] ?? null;
    }

    public function getAllLocationsAttribute(): array
    {
        return collect($this->payload['addresses'] ?? [])
            ->pluck('location')
            ->filter()
            ->unique()
            ->values()
            ->toArray();
    }
}
