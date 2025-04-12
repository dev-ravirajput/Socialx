<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory()->count(10)->create(); // optional: factory users

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // default password
                'remember_token' => Str::random(10),
                'current_team_id' => null,
                'profile_photo_path' => fake()->imageUrl(200, 200, 'people'),
                'phone' => fake()->phoneNumber(),
                'bio' => fake()->realText(100),
                'city' => fake()->city(),
                'country' => fake()->country(),
                'followers' => fake()->numberBetween(0, 10000),
                'followings' => fake()->numberBetween(0, 5000),
                'posts' => fake()->numberBetween(0, 1000),
                'url' => fake()->url(),
            ]);
        }
    }
}
