<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class MyList extends Model  {

	public function users() {
		return $this->belongsTo('User');
	}

	public function myItems() {
		return $this->hasMany('App\ListItem');
	}

	public function delete() {
		ListItem::where('my_list_id', $this->id)->delete();
		Share::where('shareable_id', $this->id)->delete();
		parent::delete();
	}

}
