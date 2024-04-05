<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('services')->insert([
            ['id' => 1, 'name' => 'Accessories', 'status' => 'active'],
            ['id' => 2, 'name' => 'Laptop', 'status' => 'active'],
            ['id' => 3, 'name' => 'Tablet', 'status' => 'active'],
        ]);

    }
}
