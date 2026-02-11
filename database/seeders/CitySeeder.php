<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('data/world-database/peru/cities.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                City::create([
                    'id' => $data['0'],
                    'region_id' => $data['2'],
                    'name' => $data['1'],
                    'type' => $data['11'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
