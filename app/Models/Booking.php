<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable =[
        'user_id',
        'room_id',
        'day',
        'start',
        'end',
        'start_time',
        'end_time'
    ];
}
