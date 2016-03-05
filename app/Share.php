<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model {
/*
	public function users() {
		return $this->belongsTo('User');
	}
  */  
  public function shareable() {
  	return $this->morphTo();
  }

}
