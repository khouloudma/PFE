<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    protected $table='availabilities';
    protected $fillable = ['id_service','hours','id_visitor','state','id_user'];
}
