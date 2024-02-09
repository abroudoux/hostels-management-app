<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\RoomFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hostel_id',
        'room_number',
    ];

    /**
     * The name of the factory that should be used to generate model instances.
     *
     * @var string
     */
    protected static $factory = RoomFactory::class;
}
