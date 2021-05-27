<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table='feedback';
    protected $fillable = [
        'comments', 'rating', 'id_user', 'id_visitor',
    ];

}
