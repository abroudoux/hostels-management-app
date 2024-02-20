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
        'room_number',
        'hostel_id',
        'hostel_name',
        'hostel_location',
        'is_reserved',
    ];

    /**
     * The name of the factory that should be used to generate model instances.
     *
     * @var string
     */
    protected static $factory = RoomFactory::class;

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }
}
