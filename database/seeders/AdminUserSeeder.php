<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'customer_number' => '0',
            'role' => 'super admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('super_secure_password'),
        ]);
    }
}
