<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\MyList;
use App\Share;
use Illuminate\Support\Facades\Auth;

class ShareMiddleware 
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

      $list_id = (int)$request->route('shares');
      $id = Auth::user()->id;
      $sharelists = Share::all()->where('share_id', $id)->where('shareable_id', $list_id);

      foreach ($sharelists as $share) {
        if (!empty($share)) {
          return $next($request);
        }
     
      }
  
      return redirect('/shares');
    }

}
