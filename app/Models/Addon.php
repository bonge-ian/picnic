<?php

namespace App\Models;

use App\Casts\AsMoney;
use App\Models\Concerns\HasFormattedPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Addon extends Model
{
    use HasFactory;
    use HasFormattedPrice;

    protected $appends = [
        'formatted_price',
        'price_as_int',
    ];

    protected $fillable = [
        'name',
        'price',
        'currency',
        'description',
    ];

    protected $casts = [
        'price' => AsMoney::class,
    ];

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class);
    }
}
