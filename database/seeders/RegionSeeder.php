<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $csvFile = fopen(base_path('data/world-database/peru/states.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Region::create([
                    'id' => $data['0'],
                    'country_id' => $data['2'],
                    'name' => $data['1'],
                    'fips_code' => $data['7'],
                    'type' => $data['8'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
