<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhoneModel;
use App\Models\Manufacturer;

class PhoneModelSeeder extends Seeder
{
    public function run()
    {
        // 1. Взимаме ID-тата на производителите (ако ги няма, няма да гръмне)
        $apple = Manufacturer::where('name', 'Apple')->first();
        $samsung = Manufacturer::where('name', 'Samsung')->first();
        $xiaomi = Manufacturer::where('name', 'Xiaomi')->first();
        $huawei = Manufacturer::where('name', 'Huawei')->first();

        // 2. Добавяме модели за APPLE
        if ($apple) {
            $models = ['iPhone 13', 'iPhone 14', 'iPhone 15', 'iPhone SE'];
            foreach ($models as $name) {
                PhoneModel::firstOrCreate([
                    'name' => $name,
                    'manufacturer_id' => $apple->id
                ]);
            }
        }

        // 3. Добавяме модели за SAMSUNG
        if ($samsung) {
            $models = ['Galaxy S23', 'Galaxy S24', 'Galaxy A54', 'Galaxy Z Fold'];
            foreach ($models as $name) {
                PhoneModel::firstOrCreate([
                    'name' => $name,
                    'manufacturer_id' => $samsung->id
                ]);
            }
        }

        // 4. Добавяме модели за XIAOMI
        if ($xiaomi) {
            $models = ['Xiaomi 13', 'Redmi Note 12', 'Redmi Note 13', 'Poco F5'];
            foreach ($models as $name) {
                PhoneModel::firstOrCreate([
                    'name' => $name,
                    'manufacturer_id' => $xiaomi->id
                ]);
            }
        }
        
        // 5. Добавяме модели за HUAWEI
        if ($huawei) {
            $models = ['P60 Series', 'Mate 50', 'Nova 11'];
            foreach ($models as $name) {
                PhoneModel::firstOrCreate([
                    'name' => $name,
                    'manufacturer_id' => $huawei->id
                ]);
            }
        }
    }
}