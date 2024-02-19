<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hostel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hostel = Hostel::inRandomOrder()->first();
        $hostelId = $hostel->id;
        $hostelName = $hostel->name;
        $hostelLocation = $hostel->location;

        return [
            'name' => $this->faker->unique()->name(),
            'room_number' => $this->faker->unique()->numberBetween(1, 100),
            'hostel_id' => $hostelId,
            'hostel_name' => $hostelName,
            'hostel_location' => $hostelLocation,
        ];
    }
}
