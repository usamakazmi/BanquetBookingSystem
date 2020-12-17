<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customtheme extends Model
{
    //table name
    protected $table = 'Customthemes';

    public $primaryKey = 'id';

    public $timestamps = true;
}
