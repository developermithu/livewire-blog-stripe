<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            PlanSeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            // CommentSeeder::class,
        ]);
        
    }
}
