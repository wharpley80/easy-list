<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class MyList extends Model  {

	public function users() {
		return $this->belongsTo('User');
	}
  
   public function shares() {
  	return $this->morphMany('\App\Share', 'shareable');
  }
}
