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
        //1:0001
        if( ($request->input('p') == NULL) and ($request->input('c') == NULL) and ($request->input('l') == NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //2:0010
        elseif( ($request->input('p') == NULL) and ($request->input('c') == NULL) and ($request->input('l') != NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('location', 'like', $request->input('l').'%' )->paginate(10);
        }
        //3:0011
        elseif( ($request->input('p') == NULL) and ($request->input('c') == NULL) and ($request->input('l') != NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('location', 'like', $request->input('l').'%' )
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //4:0100
        elseif( ($request->input('p') == NULL) and ($request->input('c') != NULL) and ($request->input('l') == NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('location', 'like', $request->input('l').'%' )->paginate(10);
        }
        //5:0101
        elseif( ($request->input('p') == NULL) and ($request->input('c') != NULL) and ($request->input('l') == NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('capacity', '<=', $request->input('c'))
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //6:0110
        elseif( ($request->input('p') == NULL) and ($request->input('c') != NULL) and ($request->input('l') != NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('capacity', '<=', $request->input('c'))
            ->where('location', 'like', $request->input('l').'%' )->paginate(10);
        }
        //7:0111
        elseif( ($request->input('p') == NULL) and ($request->input('c') != NULL) and ($request->input('l') != NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('capacity', '<=', $request->input('c'))
            ->where('location', 'like', $request->input('l').'%' )
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //8:1000
        elseif( ($request->input('p') != NULL) and ($request->input('c') == NULL) and ($request->input('l') != NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('location', 'like', $request->input('l').'%' )->paginate(10);
        }
        //9:1001
        elseif( ($request->input('p') != NULL) and ($request->input('c') == NULL) and ($request->input('l') == NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //10:1010
        elseif( ($request->input('p') != NULL) and ($request->input('c') == NULL) and ($request->input('l') != NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('location', 'like', $request->input('l').'%' )->paginate(10);
        }
        //11:1011
        elseif( ($request->input('p') != NULL) and ($request->input('c') == NULL) and ($request->input('l') != NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('location', 'like', $request->input('l').'%' )
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //12:1100
        elseif( ($request->input('p') != NULL) and ($request->input('c') != NULL) and ($request->input('l') == NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('capacity', '<=', $request->input('c'))->paginate(10);
        }
        //13:1101
        elseif( ($request->input('p') != NULL) and ($request->input('c') != NULL) and ($request->input('l') == NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('capacity', '<=', $request->input('c'))
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        //14:1110
        elseif( ($request->input('p') != NULL) and ($request->input('c') != NULL) and ($request->input('l') != NULL) and ($request->input('n') == NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('capacity', '<=', $request->input('c'))
            ->where('location', 'like', $request->input('l').'%' )->paginate(10);
        }
        //15:1111
        elseif( ($request->input('p') != NULL) and ($request->input('c') != NULL) and ($request->input('l') != NULL) and ($request->input('n') != NULL))
        {
            $posts = DB::table('posts')->where('price', '<=', $request->input('p'))
            ->where('capacity', '<=', $request->input('c'))
            ->where('location', 'like', $request->input('l').'%' )
            ->where('name', 'like', $request->input('n').'%' )->paginate(10);
        }
        
        return view('posts.index')->with('posts', $posts);

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