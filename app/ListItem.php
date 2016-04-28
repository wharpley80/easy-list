<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ListItem extends Model  
{

	public function myList() 
	{
		return $this->belongsTo('App\MyList');
	}
	
}