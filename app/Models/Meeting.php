<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable =[
        'venue',
        'start_time',
        'end_time'

    ];
}
