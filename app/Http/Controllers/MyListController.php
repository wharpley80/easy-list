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

class MyListController extends Controller  {

	public function index() {

  	return view('home');

	}

  public function create() {

  	return view('lists.create');

	}

  public function store(Request $request) {
    
    $validator = Validator::make($request->all(), [
      'list' => 'required'
    ]);

    if ($validator->fails()) {

      return redirect('/')->withErrors($validator)->withInput();

    }

    $list = $request->input('list');
    $user_id = Auth::user()->id;
    $insert = new \App\MyList();
    $insert->user_id = $user_id;
    $insert->list = $list;
    $insert->save();

    $newlist = \App\MyList::all();

    foreach ($newlist as $new) {
      $newid = $new->id;
    }

    $list = MyList::findOrFail($newid);	

    return view('lists.show', [$newid])->withList($list);

  }

  public function show($id)	{

  	$list = MyList::findOrFail($id);
		//$items = $list->listItems()->get();
		return view('lists.show')
		->withList($list);
		//->withItems($items);
  	/*
  	$showlist = $request->input('show-list');
  	$listid = \App\Lists::all()->where('list', $showlist);

  	foreach ($listid as $lid) {
  		$myid = $lid->id;
  	}*/
    return $request->all();
  	//return redirect()->route('lists.show', array($myid))->with('showlist', $showlist);
  	//return view('home');
  }

  public function edit($id)	{

  	$list = MyList::findOrFail($id);

  	return view('lists.edit')->withList($list);
  }

  public function update(Request $request, $id)	{

  	$validator = Validator::make($request->all(), [
      'list' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect('lists.edit', $id)->withErrors($validator)->withInput();
    }

    $list = $request->input('list');
    $user_id = Auth::user()->id;
    $insert = MyList::findOrFail($id);
    $insert->user_id = $user_id;
    $insert->list = $list;
    $insert->update();

    $newlist = \App\MyList::all();

    foreach ($newlist as $new) {
    	$newid = $new->id;
    }
    
    $list = MyList::findOrFail($newid);

    return view('lists.show', [$newid])->withList($list);
  }

  public function share($id)	{

  	$list = MyList::findOrFail($id);
		//$items = $list->listItems()->get();
		return view('lists.share')->withList($list);

  }



  public function destroy($id)	{

  	$list = MyList::findOrFail($id)->delete();
		
		return redirect('/home')->withMessage('List Deleted');
  }

}
