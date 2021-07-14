<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table='visitors';
    protected $fillable = [
         'name','phone','email', 'purpose','visitor_image','Qrcode','code','type','checkout_date','frequentlyVisted','id_user','field1','field2','field3','id_service','id_event'
    ];
}
