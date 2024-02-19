<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ReservationFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'room_name',
        'room_number',
        'hostel_id',
        'hostel_name',
        'hostel_location',
        'user_id',
        'user_name',
        'start_date',
        'end_date',
    ];

    /**
     * The name of the factory that should be used to generate model instances.
     *
     * @var string
     */
    protected static $factory = ReservationFactory::class;
}
