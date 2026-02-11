<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('data/world-database/peru/countries.csv'), 'r');
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (! $firstline) {
                Country::create([
                    'id' => $data['0'],
                    'iso2' => $data['3'],
                    'phonecode' => $data['5'],
                    'capital' => $data['6'],
                    'currency' => $data['7'],
                    'currency_symbol' => $data['9'],
                    'native' => $data['11'],
                    'timezones' => $data['22'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
