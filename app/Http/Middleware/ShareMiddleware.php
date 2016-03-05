<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\MyList;
use App\Share;
use Illuminate\Support\Facades\Auth;

class ShareMiddleware {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */

    public function handle($request, Closure $next) {

      $id = $request->route('shares');
      $sharelists = Share::all()->where('share_id', Auth::user()->id);

      foreach ($sharelists as $share) {
        $share_id = $share->share_id;
        $list_id = $share->shareable_id;

        if (Auth::user()->id == $share_id && $id == $list_id) {
          return $next($request);
        } 
      }

      return redirect('/shares');

    }

    


}
