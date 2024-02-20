<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Hostel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Hostel::factory(5)->create();
        Room::factory(20)->create();
        Reservation::factory(15)->create();

        User::factory()->create([
            'name' => 'toto',
            'email' => 'arthur.broudoux@gmail.com',
            'password' => 'totototo',
            'is_admin' => '1',
        ]);
    }
}
