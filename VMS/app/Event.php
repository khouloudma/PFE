<?php
namespace App;

use App\Availability;
use App\Service;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $table='events';

	protected $fillable = [
		'title', 'start', 'breaktime','id_department','start_break','end_break','id_service','recurrence','end','color','textColor','id_user','state','limit_of_attendees'
	];

    public function availability()
    {
      return $this->hasMany(Availability::class);
    }
	public function service()
{
    return $this->belongsTo(Service::class);
}


}

?>
