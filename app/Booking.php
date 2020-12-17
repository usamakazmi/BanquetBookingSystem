<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //table name
    protected $table = 'bookings';

    public $primaryKey = 'id';

    public $timestamps = true;
}
