<?php

namespace Database\Seeders;

use App\Models\ApprovedBooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApprovedBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApprovedBooking::factory()->count(5)->create();
    }
}
