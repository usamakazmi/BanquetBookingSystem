<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customercustombooking extends Model
{
    protected $table = 'Customercustombookings';

    public $primaryKey = 'id';

    public $timestamps = true;
}
