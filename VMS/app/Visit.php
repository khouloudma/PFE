<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table='visits';
    protected $fillable = [
        'field1','field2','field3','name','phone','email', 'purpose','visitor_visit_image','checkout_date','id_user'
    ];
}
