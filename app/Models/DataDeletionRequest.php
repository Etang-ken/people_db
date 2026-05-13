<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class DataDeletionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_profile_id',
        'id_front_path',
        'id_back_path',
        'selfie_path',
        'ssn_card_path',
        'contact_email',
        'status',
        'processed_at',
        'admin_notes',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
    ];

    public function userProfile(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function getIdFrontUrlAttribute(): ?string
    {
        return $this->id_front_path ? Storage::disk('public')->url($this->id_front_path) : null;
    }

    public function getIdBackUrlAttribute(): ?string
    {
        return $this->id_back_path ? Storage::disk('public')->url($this->id_back_path) : null;
    }

    public function getSelfieUrlAttribute(): ?string
    {
        return $this->selfie_path ? Storage::disk('public')->url($this->selfie_path) : null;
    }

    public function getSsnCardUrlAttribute(): ?string
    {
        return $this->ssn_card_path ? Storage::disk('public')->url($this->ssn_card_path) : null;
    }

    public function markAsProcessing(): void
    {
        $this->update(['status' => 'processing']);
    }

    public function markAsCompleted(?string $notes = null): void
    {
        $this->update([
            'status' => 'completed',
            'processed_at' => now(),
            'admin_notes' => $notes,
        ]);
    }

    public function markAsRejected(string $reason): void
    {
        $this->update([
            'status' => 'rejected',
            'processed_at' => now(),
            'admin_notes' => $reason,
        ]);
    }

    public function deleteDocuments(): void
    {
        $paths = [
            $this->id_front_path,
            $this->id_back_path,
            $this->selfie_path,
            $this->ssn_card_path,
        ];

        foreach ($paths as $path) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $request) {
            $request->deleteDocuments();
        });
    }
}
