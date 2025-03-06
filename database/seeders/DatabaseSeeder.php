<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>Hash::make('Anesu@gmail.com'),
            'username' =>'testuser',
            'role' => 'admin',
        ]);
        user::factory()->create([
            'name'=> 'Company User',
            'email' => 'company@gmail.com',
            'password' =>Hash::make('User@gmail.com'),
            'username' =>'companyUser',
            'role'=> 'company',
            'company_name' => 'ABC Corporation',
        ]);
    }
}
