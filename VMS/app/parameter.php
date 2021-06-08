<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parameter extends Model
{
    protected $table='parameters';
    protected $fillable = [
        'requireCapture','requirePrinter','id_user','field1','field2','field3', 'requirefield1','requirefield2','requirefield3','enablefield1','enablefield2','enablefield3'
   ];

}
