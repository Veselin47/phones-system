<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class ManufacturerSeeder extends Seeder
{
    public function run()
    {
        // Проверяваме дали вече има записи, за да не ги дублираме
        if (Manufacturer::count() == 0) {
            Manufacturer::create(['name' => 'Apple', 'country' => 'USA']);
            Manufacturer::create(['name' => 'Samsung', 'country' => 'South Korea']);
            Manufacturer::create(['name' => 'Xiaomi', 'country' => 'China']);
            Manufacturer::create(['name' => 'Huawei', 'country' => 'China']);
            Manufacturer::create(['name' => 'Nokia', 'country' => 'Finland']);
        }
    }
}