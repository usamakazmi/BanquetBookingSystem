<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use DB;

use App\Theme;
use App\Customtheme;
use App\Booking;
use App\Customerbooking;

use App\Owner;
use App\Post;
use App\User;
use Auth;


class CustomerbookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            
            'sofa' => 'nullable',
            'table' => 'nullable',
            'stage' => 'nullable',
            'carpet' => 'nullable',
            'curtains' => 'nullable',
            'tables' => 'nullable',
            'chairs' => 'nullable',
            'cover' => 'nullable',
            'jhoomar' => 'nullable',
            'lighting' => 'nullable',
            'flowers' => 'nullable',
            'system' => 'nullable',
            'eatsystem'=> 'nullable',
            'ventilation'=> 'nullable',
            'fireworks'=> 'nullable',
            'music'=> 'nullable',
            'water'=> 'nullable',

            'desert'=> 'nullable',
            'dinner'=> 'nullable',
            'appetizer'=> 'nullable',
            'drinks'=> 'nullable',
            

            'date' => 'required',

            'starttime' => 'required',
            
            'endtime' => 'required',

            'customer_id' => 'required',

            'book_id' => 'required',
          
                 
        ]);
        $user = User::find(Auth::guard('web')->user()->id);
        if (!isset($user)){
            return  redirect()->back()->with('error', 'user not found');
        }

       
        $post = Post::find($id);
        if (!isset($post)){
            return  redirect()->back()->with('error', 'Nothing Found');
        }

        $booking = Booking::find($request->input('book_id'));
        if (!isset($booking)){
            
           
      
            return  redirect()->back()->with('error', 'Booking Slot doest exist');
        }


        $customerbooking = new Customerbooking;
        
        //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        
        $customerbooking->pics = $request->input('sofa').'/'
        .$request->input('table').'/'
        .$request->input('stage').'/'
        .$request->input('carpet').'/'
        .$request->input('curtains').'/'
        .$request->input('tables').'/'
        .$request->input('chairs').'/'
        .$request->input('cover').'/'
        .$request->input('jhoomar').'/'
        .$request->input('lighting').'/'
        .$request->input('flowers').'/'
        .$request->input('system').'/'
        .$request->input('eatsystem').'/'
        .$request->input('ventilation').'/'
        .$request->input('fireworks').'/'
        .$request->input('music').'/'
        .$request->input('water').'/'
        .$request->input('desert').'/'
        .$request->input('dinner').'/'
        .$request->input('appetizer').'/'
        .$request->input('drinks');
       
        ;

        /////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////Fetching Price from Images///////////////////////////
        /////////////////////////////////////////////////////////////////////////////////
        $string1 =  $customerbooking->pics ;
        $cnt = 0;
         $string1= str_replace("/", " ", $string1);// contains items with their price-----------------
               
            $strArray = explode(' ',$string1);
            $cnt = sizeof($strArray);
            $t = $post->price;
            $ok = 0;
            $tr = null;
            while($cnt > $ok)
            {
                $temp = $strArray[$ok];
                $demo =explode('_', $temp);
                $temp2 = explode('@',$temp);
                $temp3 = explode('_', $temp2[0]);
                //echo $temp3[0];
                $temp4 = explode('_', $temp2[1]);
                //echo $temp4[0];
                $temp = str_replace("@", "Rs........................................................................................................................................................................................................................................................................", $demo[0]);// contains items with their price-----------------
                $tr = $tr.'<br>'.$temp;
                echo $tr;
                //echo $temp;
                
                
                $t = $t + $temp3[0];
                $ok++;
            }
       
        $customerbooking->bill = $tr;
        $customerbooking->total = $t;

      

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

        $customerbooking->banquet_id = $id;

        $customerbooking->id = $request->input('customer_id');

        $customerbooking->customer_id =  $request->input('customer_id');
        
        $customerbooking->date = $request->input('date');
        $customerbooking->starttime = $request->input('starttime');
        $customerbooking->endtime = $request->input('endtime');
        
        // Create Post
        $booking->delete();
        $customerbooking->save();
        $user->bookstat = 1;
        $user->save();
       
       
        return redirect()->back()->with('success', 'Booking Successful');
    


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerbooking = Customerbooking::find($id);
        $user = User::find(Auth::guard('web')->user()->id);
        if (!isset($user)){
            return  redirect()->back()->with('error', 'user not found');
        }

        
        //Check if post exists before deleting
        if (!isset($customerbooking)){
            return redirect()->back()->with('error', 'Nothing Found');
        }

    
        
        $booking = new Booking;
        $booking->banquet_id = $customerbooking->banquet_id;
        $booking->date = $customerbooking->date;
        $booking->starttime = $customerbooking->starttime;
        $booking->endtime = $customerbooking->endtime;
        
      

        $booking->save();
        
        $customerbooking->delete();
        $user->bookstat = 0;
        $user->save();
       
       
       
        return redirect()->back()->with('success', 'Booking Cancelled');

        
    }
}
