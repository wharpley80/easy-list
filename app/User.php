<?php

namespace App;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  public function mylisting() 
  {
    return $this->hasMany('App\MyList')->orderBy('list', 'asc');
  }

  public function shareList() 
  {
    return $this->belongsToMany('App\MyList', 'shares', 'share_id', 'shareable_id');
  }

  public function myrole() 
  {
    return $this->hasMany('App\MyList')->where('user_id', Auth::user()->id);
  }

  public function roleShare() 
  {
    return $this->morphMany('App\Share', 'shareable');
  }

  public function delete() 
  {
    MyList::where('user_id', $this->id)->delete();
    Share::where('share_id', $this->id)->delete();
    parent::delete();
  }

}
