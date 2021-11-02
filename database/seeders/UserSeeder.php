<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // User Default
        User::factory()->create([
            'name'      => 'user',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('user'),
            'type' => User::DEFAULT,
        ])->profile()->save(Profile::factory()->make());

        // Moderator
        User::factory()->create([
            'name'      => 'moderator',
            'email'     => 'moderator@gmail.com',
            'password'  => bcrypt('moderator'),
            'type' => User::MODERATOR,
        ])->profile()->save(Profile::factory()->make());

        // Writer
        User::factory()->create([
            'name'      => 'writer',
            'email'     => 'writer@gmail.com',
            'password'  => bcrypt('writer'),
            'type' => User::WRITER,
        ])->profile()->save(Profile::factory()->make());

        // Admin
        User::factory()->create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin'),
            'type' => User::ADMIN,
        ])->profile()->save(Profile::factory()->make());

        // Super Admin
        User::factory()->create([
            'name'      => 'super admin',
            'email'     => 'superadmin@gmail.com',
            'password'  => bcrypt('superadmin'),
            'type' => User::SUPERADMIN,
        ])->profile()->save(Profile::factory()->make());

        
        User::factory(10)->create()->each(function ($user) {
            $user->profile()->save(Profile::factory()->make());
        });
    }
}
