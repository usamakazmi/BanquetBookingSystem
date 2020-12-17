<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerbooking extends Model
{
    protected $table = 'Customerbookings';

    public $primaryKey = 'id';

    public $timestamps = true;
}
