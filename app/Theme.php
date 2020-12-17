<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
     //table name
     protected $table = 'themes';

     public $primaryKey = 'id';
 
     public $timestamps = true;
 
}
