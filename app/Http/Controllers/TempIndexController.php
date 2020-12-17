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

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:owner', ['except' => ['index', 'show','store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->data == 'price')
        {
            $this->validate($request, [
                'p' => 'required',
                'data' => 'required',
                
                
            ]);
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))->paginate(10);
            return view('posts.index')->with('posts', $posts);
    
        }
        elseif($request->data == 'capacity')
        {
            $this->validate($request, [
                'c' => 'required',
                'data' => 'required',
                
                
            ]);
            $posts = DB::table('posts')->where('capacity', '<=', $request->input('c'))->paginate(10);
            return view('posts.index')->with('posts', $posts);
    
        }
        elseif($request->data == 'location')
        {
            $this->validate($request, [
                'l' => 'required',
                'data' => 'required',
                
                
            ]);
            $posts = DB::table('posts')->where('location', 'like', $request->input('l').'%' )->paginate(10);
            return view('posts.index')->with('posts', $posts);
    
        }
        elseif($request->data == 'name')
        {
            $this->validate($request, [
                'n' => 'required',
                'data' => 'required',
                
                
            ]);
            $posts = DB::table('posts')->where('name', 'like', $request->input('n').'%' )->paginate(10);
            return view('posts.index')->with('posts', $posts);
            //'%'.$request->input('n').'%' this would fine any thing that contains $request->input('n')
            //$request->input('n').'%' this would fine any thing that starts with  $request->input('n')
            
    
        }
       else
        {
            $posts = Post::orderBy('created_at','desc')->paginate(10);
            return view('posts.index')->with('posts', $posts);

        }
       
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        
       
        //return redirect('/posts')->with('success', 'Banquet Creation Successfull');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}