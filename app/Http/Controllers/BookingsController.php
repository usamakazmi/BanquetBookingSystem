<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use DB;

use App\Theme;
use App\Customtheme;
use App\Booking;

use App\Owner;
use App\Post;
use App\User;
use Auth;


class BookingsController extends Controller
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
            
            'd' => 'required',
                     
        ]);
        $bookings  = Booking::where('date', 'd')->get();
        return view('posts.show')->with('bookings', $bookings);
        
        
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
            
            'date' => 'required',
            
            'starttime' => 'required',
            
            'endtime' => 'required',
                 
        ]);
        $post = Post::find($id);
        if (!isset($post)){
            return  redirect()->back()->with('error', 'Nothing Found');
        }


        $string1 = $request->input('starttime');
        $string2 = $request->input('endtime');
       
        $time1 = explode(':',$string1);
        $time2 = explode(':',$string2);

        $count = 0;

        
        
        if($time1[0] > $time2[0])
        {
            $count = 1;

        }
        if($time1[0] == $time2[0] and $time1[1] > $time2[1])
        {
            $count = 1;
            
        }

        if($time1[0] == $time2[0] and $time1[1] == $time2[1])
        {
            $count = 1;
        }
        
        if($count>0)
        {
            return  redirect()->back()->with('error', 'Enter Times Correctly');
        
        }
        
       

        $booking = new Booking;
        $booking->banquet_id = $id;
        $booking->date = $request->input('date');
        $booking->starttime = $request->input('starttime');
        $booking->endtime = $request->input('endtime');
        
      

        $booking->save();

        //return redirect('/posts/$id')->with('success', 'Slot Created Successfully');
        //return redirect::to('posts')->with(['id'=>$id,'succes' => 'Alread Apply for this post']);
        return redirect()->to('posts/'.$id)->with('success', 'Slot Created Successfully');
        
        ##################
        ##################
        ##################
        //return redirect(url()->previous().'#'.$post->id)->with('success', 'Slot Created Successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        //Check if post exists before deleting
        if (!isset($booking)){
            return redirect()->back()->with('error', 'Nothing Found');
        }

        
        $booking->delete();
        return redirect()->back()->with('success', 'Slot Removed Successfully');
    
    }
}
