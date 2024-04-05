<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('branches')->insert([
            [
                'name' => 'Sadton',
                'address' => 'Address 1',
                'phone' => '1234567890',
                'email' => 'info@computerguardian.co.za',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pretoria',
                'address' => 'Address 2',
                'phone' => '1234567890',
                'email' => 'info@computerguardian.co.za',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Midrand',
                'address' => 'Address 3',
                'phone' => '1234567890',
                'email' => 'info@computerguardian.co.za',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
