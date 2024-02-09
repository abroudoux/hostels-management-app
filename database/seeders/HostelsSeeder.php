<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hostel;

class HostelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hostel::factory()->count(10)->create();
    }
}
