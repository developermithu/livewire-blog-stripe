<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stripe_name',
        'stripe_product_id',
        'stripe_price_id',
        'price',
        'abbreviation',
    ];

    protected $casts = [
        'price' => PriceCast::class,
    ];

    public function name()
    {
        return $this->name;
    }

    public function price()
    {
        return '$' . number_format($this->price, 2);
    }

    public function abbreviation()
    {
        return $this->abbreviation;
    }

    public function stripeName()
    {
        return $this->stripe_name;
    }

    public function stripeProductId()
    {
        return $this->stripe_product_id;
    }

    public function stripePriceId()
    {
        return $this->stripe_price_id;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
