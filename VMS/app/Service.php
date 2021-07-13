<?php

namespace App;
use App\Event;
use App\Department;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';

	protected $fillable = [
		'title', 'start', 'breaktime','start_break','end_break','id_department','recurrence','end','color','AllDay','textColor','id_user','state','limit_of_attendees'
	];
	
    public function event()
    {
      return $this->hasMany(Event::class);
    }
	public function department()
	{
		return $this->belongsTo(Department::class);
	}

}
