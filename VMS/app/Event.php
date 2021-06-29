<?php
namespace App;



use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    protected $table='events';

	protected $fillable = [
		'title', 'start', 'end','color','AllDay','textColor','id_user','state','limit_of_attendees'
	];
}

?>
