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
        $roomId = $room->id;
        $roomName = $room->name;
        $roomNumber = $room->room_number;
        $user = User::inRandomOrder()->first();
        $userId = $user->id;
        $userName = $user->name;
        $hostel = Hostel::inRandomOrder()->first();
        $hostelId = $hostel->id;
        $hostelName = $hostel->name;
        $hostelLocation = $hostel->location;

        return [
            'room_id' => $roomId,
            'room_name' => $roomName,
            'room_number' => $roomNumber,
            'user_id' => $userId,
            'user_name' => $userName,
            'hostel_id' => $hostelId,
            'hostel_name' => $hostelName,
            'hostel_location' => $hostelLocation,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
