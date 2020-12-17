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
Use App\Message;
use App\Owner;
use App\Post;
use App\User;
use Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:owner', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
        
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'name' => 'required',
            'location' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'phone' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'near' => 'required'
            
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->name = $request->input('name');
        $post->location = $request->input('location');
        $post->owner_id = Auth::guard('owner')->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->phone = $request->input('phone');
        $post->capacity = $request->input('capacity');
        $post->price = $request->input('price');
        $post->near = $request->input('near');
      
        $post->save();

        return redirect('/posts')->with('success', 'Banquet Creation Successfull');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $themes = Theme::orderBy('created_at','desc')->paginate(10);
        $customthemes = Customtheme::orderBy('created_at','desc')->paginate(10);
        $bookings = Booking::all();
        $customercustombookings = Customercustombooking::all();
        $customerbookings = Customerbooking::all();
        $messages = Message::all();
        //foreach()
        //deleted_at = now()->addHours(24);
      
    
        $post = Post::find($id);
        return view('posts.show')->with('post', $post)->with('themes', $themes)
        ->with('customthemes', $customthemes)->with('bookings', $bookings)
        ->with('customercustombookings',  $customercustombookings)
        ->with('customerbookings', $customerbookings)->with('messages', $messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'Nothing Found');
        }

        // Check for correct user
        if(Auth::guard('owner')->user()->id !==$post->owner_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
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
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'near' => 'required'
            
        ]);
		$post = Post::find($id);
         // Handle File Upload
        if($request->hasFile('cover_image')){
            
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        // Update Post
        $post->name = $request->input('name');
        $post->location = $request->input('location');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->phone = $request->input('phone');
        $post->capacity = $request->input('capacity');
        $post->price = $request->input('price');
        $post->near = $request->input('near');
      
        $post->save();

        return redirect('/posts')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/posts')->with('error', 'Nothing Found');
        }

        // Check for correct user
        if(Auth::guard('owner')->user()->id !==$post->owner_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Removed Successfully');
    }
}