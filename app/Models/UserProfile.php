<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'payload', 'pdf_path'];

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

    /**
     * Check if profile has a PDF document
     */
    public function hasPdf(): bool
    {
        return !empty($this->pdf_path) && Storage::disk('public')->exists($this->pdf_path);
    }

    /**
     * Get the PDF URL
     */
    public function getPdfUrlAttribute(): ?string
    {
        return $this->hasPdf() ? Storage::disk('public')->url($this->pdf_path) : null;
    }

    /**
     * Delete the PDF file from storage
     */
    public function deletePdf(): void
    {
        if (!empty($this->pdf_path) && Storage::disk('public')->exists($this->pdf_path)) {
            Storage::disk('public')->delete($this->pdf_path);
        }
    }

    /**
     * Boot the model
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $profile) {
            $profile->slug = $profile->generateUniqueSlug($profile->name);
        });

        static::updating(function (self $profile) {
            if ($profile->isDirty('name') && empty($profile->slug)) {
                $profile->slug = $profile->generateUniqueSlug($profile->name);
            }
        });

        static::deleting(function (self $profile) {
            $profile->deletePdf();
        });
    }

    /**
     * Generate a unique slug from name
     */
    public function generateUniqueSlug(string $name): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        // Check for existing slugs and append number if needed
        while (self::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Get the route key for the model (use slug instead of id)
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
