<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@glorytape.dev',
                'password' => 'admin123',
                'role' => 'admin',
            ],
            [
                'name' => "User1",
                'email' => "user1@glorytape.dev",
                'password' => "User1123",
                'role' => "user",
            ],
            [
                'name' => "User2",
                'email' => "user2@glorytape.dev",
                'password' => "User2123",
                'role' => "user",
            ],
        ];

        foreach ($users as $user) {
            $user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'username' => explode('@', $user['email'])[0],
                'password' => Hash::make($user['password']),
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'remember_token' => Str::random(32),
            ])->assignRole($user['role']);
        }
    }
}
