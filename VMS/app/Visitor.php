<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table='visitors';
    protected $fillable = [
         'name','phone','email', 'purpose','visitor_image','code','checkout_date','frequentlyVisted','id_user'
    ];
}
