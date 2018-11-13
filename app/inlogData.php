<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inlogData extends Model
{
    protected $table = 'inlogData';
    protected $fillable = [ 'name','password' ];

}
