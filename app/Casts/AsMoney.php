<?php

namespace App\Casts;

use Brick\Money\Exception\UnknownCurrencyException;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AsMoney implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     *
     * @throws UnknownCurrencyException
     */
    public function get($model, string $key, $value, array $attributes): mixed
    {
        return \Brick\Money\Money::ofMinor($attributes['price'], $attributes['currency']);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes): mixed
    {
        if (! $value instanceof \Brick\Money\Money) {
            return $value;
        }

        return $value->getMinorAmount()->toInt();
    }
}
