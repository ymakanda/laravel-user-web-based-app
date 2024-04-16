<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data = ['1' => 'coding', '2' => 'reading'];

        $user = \App\Models\User::create([
            'name' => 'Admin',
            'surname' => 'Test',
            'id_numder' => '9001015678908',
            'mobile_number' => '0123456789',
            'birth_date' => date('1988/10/13'),
            'language' => 'Test Admin User',
            'interests' => json_encode($data),
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),            
        ]);
    }
}
