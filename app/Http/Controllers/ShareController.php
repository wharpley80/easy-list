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

class ShareController extends Controller  {

	public function __construct() {
    
    $this->middleware('isShare', ['only' => 'show']);
  
  }

  public function index() {

		$mysharelists = User::find(Auth::user()->id)
			->shareList()
			->orderBy('list')
			->distinct()
			->get();

			$sharelists = Share::all()->where('share_id', Auth::user()->id);

    return view('shares.index')->with('mysharelists', $mysharelists)->with('sharelists', $sharelists);

  } 

  public function show($id)	{

  	$list = MyList::findOrFail($id);
  	$items = $list->myItems()->get();
		
		return view('shares.show')->withList($list)->withItems($items);

  }

  public function clear($id) {

  	ListItem::where('my_list_id', $id)->delete();

  	return redirect()->route('shares.show', [$id]);

  }

}
