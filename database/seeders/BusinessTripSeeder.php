<?php

namespace Database\Seeders;

use App\Models\BusinessTrip;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    BusinessTrip::factory()->count(200)->create();
    }
}
