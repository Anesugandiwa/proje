<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable =[
        'date',
        'start_time',
        'end_time',
        'spaces',
        'title',
        'company_name',
        'phone_number',

    ];
}
