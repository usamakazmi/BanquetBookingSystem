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


class CustomercustombookingController extends Controller
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
        $this->validate($request, [
            
            'date' => 'required',
            
            'starttime' => 'required',
            
            'endtime' => 'required',

            'customer_id' => 'required',

            'book_id' => 'required',
          
                 
        ]);

        

        $booking = Booking::find($request->input('book_id'));
        if (!isset($booking)){
            return  redirect()->back()->with('error', 'No such slot exist');
        }

        
        $customercustombooking = Customercustombooking::find($request->input('customer_id'));

        if (!isset($customercustombooking))
        {
            return  redirect()->back()->with('error', '*Create Custom Theme First or Use Manual Themes'); 
        }
        else
        {
            
            $customercustombooking->date = $request->input('date');
            $customercustombooking->starttime = $request->input('starttime');
            $customercustombooking->endtime = $request->input('endtime');
            
            $booking->delete();
            
            $customercustombooking->save();

            return redirect()->back()->with('success', 'Booking Successful');    
        }



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
        //dd($request);
        $this->validate($request, [
            
             
            'customer_id' => 'required',
            
            'pics' => 'required',


            'data' => 'required',
            
            //'starttime' => 'required',
            
            //'endtime' => 'required',

            //'book_id' => 'required',
           
            'customer_id' => 'required',

            
                 
        ]);
        $string =  $request->input('data');
        $strArray = explode('/',$string);
        $cnt = sizeof($strArray);
       
       //echo $strArray[$cnt-1]; //bookid
       //echo $strArray[$cnt-2]; //endtime
       //echo $strArray[$cnt-3]; //start
       //echo $strArray[$cnt-4]; //date
       
       $user = User::find(Auth::guard('web')->user()->id);
       if (!isset($user)){
           return  redirect()->back()->with('error', 'user not found');
       }

                    

        $post = Post::find($id);

        $booking = Booking::find($strArray[$cnt-1]);
        if (!isset($booking)){
            return  redirect()->back()->with('error', 'No such slot exist');
        }
        
        $customercustombooking = Customercustombooking::find($request->input('customer_id'));
        
        
        $customercustombooking = new Customercustombooking ;

        $customercustombooking->id = $request->input('customer_id');

        $customercustombooking->banquet_id = $id;
    
        $customercustombooking->customer_id =  $request->input('customer_id');
    
        $customercustombooking->pics = $request->input('pics');

        $customercustombooking->date = $strArray[$cnt-4];
        $customercustombooking->starttime = $strArray[$cnt-3];
        $customercustombooking->endtime = $strArray[$cnt-2];
            
        $booking->delete();
            

        /////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////Fetching Price from Images///////////////////////////
        /////////////////////////////////////////////////////////////////////////////////
        $string1 =  $customercustombooking->pics ;
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
       
        $customercustombooking->bill = $tr;
        $customercustombooking->total = $t;

      
      

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////


        $customercustombooking->save();
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
        
        $customercustombooking = Customercustombooking::find($id);
        $user = User::find(Auth::guard('web')->user()->id);
        if (!isset($user)){
            return  redirect()->back()->with('error', 'user not found');
        }

     
        //Check if post exists before deleting
        if (!isset($customercustombooking)){
            return redirect()->back()->with('error', 'Nothing Found');
        }

        
        $booking = new Booking;
       
        $booking->banquet_id = $customercustombooking->banquet_id;
        $booking->date = $customercustombooking->date;
        $booking->starttime = $customercustombooking->starttime;
        $booking->endtime = $customercustombooking->endtime;
        

       
        $booking->save();
        $customercustombooking->delete();
        $user->bookstat = 0;
        $user->save();
       
        return redirect()->back()->with('success', 'Booking Cancelled');


       
    }
}
