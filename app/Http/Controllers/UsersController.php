<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
use App\Users;
use App\Lists;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class UsersController extends Controller
{
  
  public function index() {

		return view('users.index');
	}
    
  public function edit($id) {
    $newname = Users::findOrFail($id);

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
    $insert = Users::findOrFail($id);
    $insert->id = $id;
    $insert->name = $newname;
    $insert->update();

    return redirect('/home');
  }

  public function destroy($id)	{

  	  	$user = Users::findOrFail($id)->delete();
		
		return redirect('/')->withMessage('Account Deleted');
  }
}
