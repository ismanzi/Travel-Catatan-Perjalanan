<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveling extends Model
{
    use HasFactory;

    protected $table = 'traveling';

    protected $fillable = [
        'user_id',
        'travel_date',
        'travel_time',
        'location',
        'body_temperature',
    ];
}
