<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\HostelFactory;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'is_reserved',
    ];

    /**
     * The name of the factory that should be used to generate model instances.
     *
     * @var string
     */
    protected static $factory = HostelFactory::class;
}
