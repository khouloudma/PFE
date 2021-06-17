<?php
namespace App;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
	use HasFactory;
    protected $table='events';

	protected $fillable = [
		'title', 'start', 'end'
	];
}

?>
