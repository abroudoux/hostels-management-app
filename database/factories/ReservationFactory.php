<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Models\Hostel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $room = Room::inRandomOrder()->first();
        $room_id = $room->id;
        $room_name = $room->name;
        $room_number = $room->room_number;
        $user = User::inRandomOrder()->first();
        $user_id = $user->id;
        $user_name = $user->name;
        $hostel = Hostel::inRandomOrder()->first();
        $hostel_id = $hostel->id;
        $hostel_name = $hostel->name;
        $hostel_location = $hostel->location;
        $persons = rand(1, 4);
        $start_date = now()->format('Y-m-d');
        $end_date = now()->addDays(rand(2, 10))->format('Y-m-d');

        return [
            'room_id' => $room_id,
            'room_name' => $room_name,
            'room_number' => $room_number,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'hostel_id' => $hostel_id,
            'hostel_name' => $hostel_name,
            'hostel_location' => $hostel_location,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'persons' => $persons,
        ];
    }
}
