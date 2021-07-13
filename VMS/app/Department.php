<?php

namespace App;
use App\Service;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';

	protected $fillable = [
		'title', 'id_user'
	];
	public function service()
    {
      return $this->hasMany(Service::class);
    }
}
