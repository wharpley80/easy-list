<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
use App\MyList;
use App\ListItem;
use App\Share;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class MyListController extends Controller  
{

  public function __construct() 
  {
    $this->middleware('isOwner', ['only' => 'show']);
  }

  public function create() 
  {
  	return view('lists.create');
	}

  public function store(Request $request) 
  {
    $validator = Validator::make($request->all(), [
      'list' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect()->route('lists.create')->withErrors($validator)->withInput();
    }

    $insert = new \App\MyList();
    $insert->user_id = Auth::user()->id;
    $insert->list = $request->input('list');
    $insert->admin = 1;
    $insert->save();
    $newlist = \App\MyList::all();

    foreach ($newlist as $new) {
      $newid = $new->id;
    }

    $list = MyList::findOrFail($newid);	

    return redirect()->route('lists.show', array($newid));
  }

  public function show($id)	
  {
  	$list = MyList::findOrFail($id);
		$items = $list->myItems()->get();

		return view('lists.show')->withList($list)->withItems($items);
  }

  public function edit($id)	
  {
  	$list = MyList::findOrFail($id);

  	return view('lists.edit')->withList($list);
  }

  public function update(Request $request, $id)	
  {
  	$validator = Validator::make($request->all(), [
      'list' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect('lists.edit', $id)->withErrors($validator)->withInput();
    }

    $insert = MyList::findOrFail($id);
    $insert->user_id = Auth::user()->id;
    $insert->list = $request->input('list');
    $insert->update();
    $newlist = \App\MyList::all();

    foreach ($newlist as $new) {
    	$newid = $new->id;
    }
    
    $list = MyList::findOrFail($newid);

    return redirect()->route('lists.show', [$id])->withList($list);
  }

  public function share($id) 
  {
  	$list = MyList::findOrFail($id);

		return view('lists.share')->withList($list);
  }

  public function save(Request $request, $id)  
  {
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

    $insert = new \App\Share();
    $insert->share_id = $email_id;
    $insert->shareable_id = $id;
    $insert->shareable_type = "MyList";
    $insert->save();

    return redirect('/home');
  }

  public function clear($id) 
  {
  	ListItem::where('my_list_id', $id)->delete();

  	return redirect()->route('lists.show', [$id]);
  }

  public function destroy($id) 
  {
  	MyList::findOrFail($id)->delete();
		
		return redirect('/home')->withMessage('List Deleted');
  }

}
