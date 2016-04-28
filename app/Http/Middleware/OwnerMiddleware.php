<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\MyList;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware 
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */

  public function handle($request, Closure $next) 
  {
    $users = User::findOrFail(Auth::user()->id);
    $id = $request->route('lists'); 

    foreach ($users->myrole as $user) {
      $role = $user->admin;
      $user_id = $user->user_id;
      $list_id = $user->id;
  
      if (!Auth::guest() && $list_id == $id && $role == 1) {
        return $next($request);
      } 

    }

    return redirect('/home');               
  }

}
