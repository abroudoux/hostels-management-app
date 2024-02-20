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
        $hostel_id = $hostel->id;
        $hoste_name = $hostel->name;
        $hostel_location = $hostel->location;

        return [
            'name' => $this->faker->unique()->name(),
            'room_number' => $this->faker->unique()->numberBetween(1, 100),
            'hostel_id' => $hostel_id,
            'hostel_name' => $hoste_name,
            'hostel_location' => $hostel_location,
        ];
    }
}
