<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\User;
use App\Lists;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class HomeController extends Controller  {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
          
      $mylists = \App\Lists::orderBy('list', 'asc')
        ->get()
        ->where('user_id', Auth::user()->id);

      return view('home')->with('mylists', $mylists);
    }

    
}
