<?php

namespace Database\Seeders;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\Country;
use App\Models\Risk;
use App\Models\TourismPlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Country::factory()
        ->count(10)
        ->has(Attraction::factory()->count(3), 'attractions')
        ->has(TourismPlace::factory()->count(2), 'tourismPlaces')
        ->has(Risk::factory()->count(2), 'risks')
        ->create();
    }
}
