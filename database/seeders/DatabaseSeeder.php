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
        User::factory(25)->create();
        Hostel::factory(50)->create();
        Room::factory(100)->create();
        Reservation::factory(75)->create();

        User::factory()->create([
            'name' => 'toto',
            'email' => 'arthur.broudoux@gmail.com',
            'password' => 'totototo',
            'is_admin' => '1',
        ]);
    }
}
