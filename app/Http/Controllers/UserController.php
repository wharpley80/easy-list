<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
use App\MyList;
use App\Share;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class UserController extends Controller 
{

  public function edit($id) 
  {
    $newname = User::findOrFail($id);

    return view('users.edit')->withNewname($newname);
  }

  public function update(Request $request, $id) 
  {
  	$validator = Validator::make($request->all(), [
      'name' => 'required|min:5'
    ]);

    if ($validator->fails()) {
      return redirect('/home')->withErrors($validator)->withInput();
    }

    $insert = User::findOrFail(Auth::user()->id);
    $insert->id = $id;
    $insert->name = $request->input('name');
    $insert->update();

    return redirect('/profile');
  }

  public function destroy($id) 
  {
    $lists = MyList::all()->where('user_id', Auth::user()->id);

    foreach ($lists as $list) {
      $list_id = $list->id;
      MyList::findOrFail($list_id)->delete();
    }
    	
    User::findOrFail($id)->delete();
		
		return redirect('/')->withMessage('Account Deleted');
  }
  
}