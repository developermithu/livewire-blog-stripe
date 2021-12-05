<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class TitleCast implements CastsAttributes
{

    /**
     * Prepare the given value for storage.
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return Str::lower($value);
    }

    /**
     * Cast the given value.
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return ucwords($value);
    }
}
