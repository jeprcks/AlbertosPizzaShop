<?php

namespace Database\Seeders;

use App\Infrastructure\Persistence\Eloquent\User\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MainAdminSeeder extends Seeder
{
    public function run(): void
    {
        if (!UserModel::where('username', 'mainadmin')->exists()) {
            UserModel::create([
                'username' => 'mainadmin',
                'password' => Hash::make('admin123'),
                'isAdmin' => true,
                'full_name' => 'Main Admin',
                'email' => 'mainadmin@gmail.com',
                'address' => '123 Main St, Anytown, USA',
                'contact_number' => '1234567890',
                'sex' => 'male',
                'age' => 25,
                'api_token' => Str::random(80),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
