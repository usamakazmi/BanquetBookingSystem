<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Owner;
class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner_id = Auth::guard('owner')->user()->id;
        $owner = Owner::find($owner_id);
        return view('owner')->with('posts', $owner->posts);
    }
}
