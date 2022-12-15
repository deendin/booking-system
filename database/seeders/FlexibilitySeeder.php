<?php

namespace Database\Seeders;

use App\Models\Flexibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlexibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flexibility::factory()->count(3)->create();
    }
}
