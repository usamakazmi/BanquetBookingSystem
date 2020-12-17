<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Theme;
use App\Customtheme;
use App\Booking;
use App\Customerbooking;
use App\Customercustombooking;

use App\Owner;
use App\Post;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customercustombookings = Customercustombooking::all();
        $customerbookings = Customerbooking::all();

        //foreach()
        //deleted_at = now()->addHours(24);
      
    
     
        return view('home')->with('customercustombookings',  $customercustombookings)->with('customerbookings', $customerbookings);
   
   
    }
}
