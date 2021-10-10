<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class PriceCast implements CastsAttributes
{

    /**
     * Prepare the given value for storage.
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value * 100;
    }

    /**
     * Cast the given value.
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return $value / 100;
    }
}
