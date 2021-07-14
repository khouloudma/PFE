<?php

namespace App;
use App\Event;
use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    protected $table='availabilities';
    protected $fillable = ['id_service','hours','id_visitor','state','id_user','id_department','event_id'];

	public function event()
	{
		return $this->belongsTo(Event::class);
	}
}
