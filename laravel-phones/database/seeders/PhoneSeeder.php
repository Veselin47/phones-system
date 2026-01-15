<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phone;
use App\Models\PhoneModel;
use App\Models\Manufacturer;

class PhoneSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Намираме Производителите по име
        $apple = Manufacturer::where('name', 'Apple')->first();
        $samsung = Manufacturer::where('name', 'Samsung')->first();
        $xiaomi = Manufacturer::where('name', 'Xiaomi')->first();

        // 2. Създаваме iPhone (Търсим модел 'iPhone 15' от другия ти сийдър)
        $iphoneModel = PhoneModel::where('name', 'iPhone 15')->first();
        
        if ($apple && $iphoneModel) {
            Phone::create([
                'name' => 'iPhone 15 Pro Max - Titanium',
                'phone_model_id' => $iphoneModel->id,
                'manufacturer_id' => $apple->id,
                'release_year' => 2023,
                'image' => 'phones/iphone.jpg', // Това сочи към storage/app/public/phones/iphone.jpg
            ]);
        }

        // 3. Създаваме Samsung (Търсим модел 'Galaxy S23')
        $samsungModel = PhoneModel::where('name', 'Galaxy S23')->first();

        if ($samsung && $samsungModel) {
            Phone::create([
                'name' => 'Samsung Galaxy S23 Ultra',
                'phone_model_id' => $samsungModel->id,
                'manufacturer_id' => $samsung->id,
                'release_year' => 2023,
                'image' => 'phones/samsung.jpg',
            ]);
        }

        // 4. Създаваме Xiaomi (Търсим модел 'Redmi Note 13')
        $xiaomiModel = PhoneModel::where('name', 'Redmi Note 13')->first();

        if ($xiaomi && $xiaomiModel) {
            Phone::create([
                'name' => 'Xiaomi Redmi Note 13 Pro+',
                'phone_model_id' => $xiaomiModel->id,
                'manufacturer_id' => $xiaomi->id,
                'release_year' => 2024,
                'image' => 'phones/xiaomi.jpg',
            ]);
        }
    }
}