<?php

namespace App\Models;

use App\Casts\AsMoney;
use App\Models\Concerns\HasFormattedPrice;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Propaganistas\LaravelPhone\Casts\E164PhoneNumberCast;

class Booking extends Model
{
    use HasFactory;
    use HasFormattedPrice;

    protected $appends = [
        'formatted_starts_at',
        'formatted_ends_at',
        'formatted_date',
        'formatted_price',
    ];

    protected $fillable = [
        'date',
        'hash',
        'email',
        'price',
        'notes',
        'phone',
        'token',
        'ends_at',
        'currency',
        'starts_at',
        'last_name',
        'first_name',
        'is_approved',
        'cancelled_at',
        'additional_hours',
        'preferred_location',
    ];

    protected $casts = [
        'date' => 'datetime',
        'ends_at' => 'datetime',
        'starts_at' => 'datetime',
        'price' => AsMoney::class,
        'is_approved' => 'boolean',
        'phone' => E164PhoneNumberCast::class.':KE',
    ];

    public function addons(): BelongsToMany
    {
        return $this->belongsToMany(Addon::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    protected function formattedStartsAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->starts_at->format('g:i a')
        );
    }

    protected function formattedEndsAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->ends_at->format('g:i a')
        );
    }

    protected function formattedDate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date->toFormattedDateString()
        );
    }

    protected static function booted()
    {
        static::creating(
            function (Model $model) {
                $model->hash = strtolower((string) Str::ulid());
                $model->token = Str::random(32);
            }
        );
    }
}
