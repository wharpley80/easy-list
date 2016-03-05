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

class ShareItemController extends Controller {

	public function store($list_id, Request $request) {

  	$list = MyList::findOrFail($list_id);	

  	$validator = Validator::make($request->all(), [
      'item' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect()->route('lists.show', array($list_id))->withErrors($validator)->withInput();
    }
 
 		$item = new \App\ListItem();
  	$item->item = $request->input('item');
  	$list->myItems()->save($item);

  	return redirect()->route('shares.show', [$list_id]);

  }
   
  public function edit($list_id, $item_id) {

  	$item = ListItem::findOrFail($item_id);

  	return view('shareitems.edit')->withListItem($item)->withMyListId($list_id);

  }

  public function update(Request $request, $list_id, $item_id) {

  	$validator = Validator::make($request->all(), [
      'item' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect()->route('shares.show', [$list_id])->withErrors($validator)->withInput();
    }

    $item = \App\ListItem::findOrFail($item_id);
    $item->item = $request->input('item');
    $item->update();

    return redirect()->route('shares.show', [$list_id]);

  }

  public function destroy($list_id, $item_id) {

  	$item = \App\ListItem::findOrFail($item_id)->delete();

  	return redirect()->route('shares.show', [$list_id]);

  }

}
