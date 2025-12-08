<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhoneModel::create(['name' => 'iPhone 13', 'manufacturer_id' => 1]);
        PhoneModel::create(['name' => 'Galaxy S21', 'manufacturer_id' => 2]);
        PhoneModel::create(['name' => 'Mi 11', 'manufacturer_id' => 3]);

    }
}
