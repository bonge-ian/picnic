<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasFormattedPrice
{
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price->formatTo('en_KE'),
        );
    }

    protected function priceAsInt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price->getMinorAmount()->toInt()
        );
    }
}
