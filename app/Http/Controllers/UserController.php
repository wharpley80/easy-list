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

class UserController extends Controller
{
  
  public function index() {

		return view('users.index');
	}
    
  public function edit($id) {
    $newname = User::findOrFail($id);

    return view('users.edit')->withNewname($newname);
  }

  public function update(Request $request, $id) {

  	$validator = Validator::make($request->all(), [
      'name' => 'required|min:5'
    ]);

    if ($validator->fails()) {
      return redirect('/home')->withErrors($validator)->withInput();
    }

    $newname = $request->input('name');
    $id = Auth::user()->id;
    $insert = User::findOrFail($id);
    $insert->id = $id;
    $insert->name = $newname;
    $insert->update();

    return redirect('/home');
  }

  public function destroy($id)	{

  	  	$user = User::findOrFail($id)->delete();
		
		return redirect('/')->withMessage('Account Deleted');
  }
}