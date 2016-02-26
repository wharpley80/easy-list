<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
//use App\Users;
use App\MyList;
use App\Share;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class ShareController extends Controller  {

  public function index() {
        
    $sharelists = \App\Share::orderBy('shareable_id', 'asc')
        ->get()
        ->where('share_id', Auth::user()->id)->lists('shareable_id');

        foreach ($sharelists as $sharelist) {

         $mysharelists = \App\MyList::orderBy('list', 'asc')->get()
        		->where('id', $sharelist);
        }
  	//$sharelists = \App\MyList::find(1)->shares;
    return view('shares.index')->with('mysharelists', $mysharelists);
  } 

  public function create() {

  }

  public function store(Request $request)	{

  	$validator = Validator::make($request->all(), [
      'email' => 'required'
    ]);

    if ($validator->fails()) {

      return redirect('/')->withErrors($validator)->withInput();

    }
    
    $email = $request->input('email');
    $emailid = User::all()->where('email', $email)->lists('id');
    foreach ($emailid as $email) {
    	$email_id = $email;
    }

    $list = $request->input('list');
    $listing = MyList::all()->where('list', $list)->where('user_id', Auth::user()->id)->pluck('id');
    foreach ($listing as $lis) {
    	$list_id = $lis;
    }
 
    $insert = new \App\Share();
    $insert->share_id = $email_id;
    $insert->shareable_id = $list_id;
    $insert->shareable_type = "MyList";
    $insert->save();

    return view('home');

  }

  public function show($id)	{

  	$list = MyList::findOrFail($id);
		
		return view('shares.show')->withList($list);

  }

}
