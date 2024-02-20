<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(20)->create();

        User::create([
            'name' => 'toto',
            'email' => 'arthur.broudoux@gmail.com',
            'password' => 'totototo',
            'is_admin' => '1',
        ]);
    }
}
