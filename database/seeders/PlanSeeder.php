<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Plan::create([
            'name' => 'Monthly Plan',
            'slug' => 'monthly-plan',
            'stripe_name' => 'monthly',
            'stripe_id' => 'price_1Jj02mGHDe88FCaV4zyILD1d',
            'price' => 5,
            'abbreviation' => '/month',
        ]);

        Plan::create([
            'name' => 'Yearly Plan',
            'slug' => 'yearly-plan',
            'stripe_name' => 'yearly',
            'stripe_id' => 'price_1Jj03AGHDe88FCaVIoFJhyUV',
            'price' => 50,
            'abbreviation' => '/year',
        ]);
    }
}
