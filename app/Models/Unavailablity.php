<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unavailablity extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'ends_at',
        'starts_at',
    ];

    protected $casts = [
        'date' => 'date',
        'ends_at' => 'datetime:H:i:s',
        'starts_at' => 'datetime:H:i:s',
    ];
}
