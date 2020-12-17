<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Theme;
use App\Customtheme;

use DB;
use App\Owner;
use App\Post;
use App\User;
use Auth;

class CustomThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$customthemes = Theme::orderBy('created_at','desc')->paginate(10);
        //return view('posts.addtheme')->with('themes', $themes);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('posts.addtheme');
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
            
            'sofa[]' => 'image|nullable|max:1999',
           // 'table' => 'required|image|max:1999',
           // 'stage' => 'required|image|max:1999',
           // 'carpet' => 'required|image|max:1999',
            
            'banquet_id' => 'required|integer',
            
        ]);
        
        $customtheme = new Customtheme;
        

        if($request->hasFile('sofa'))
        {
            foreach($request->file('sofa') as $file)
            {

            // Get filename with the extension
            $filenameWithExt = $file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $file->storeAs('public/cover_images', $fileNameToStore);
            
            // Create Post
            //$customtheme->sofa = $fileNameToStore.$customtheme->sofa;
            if($customtheme->sofa!=null)
            {
                $customtheme->sofa = $fileNameToStore.'/'.$customtheme->sofa;
            
            }   
            elseif($customtheme->sofa==null)
            {
                $customtheme->sofa = $fileNameToStore;
                
            }
            
            }
        } 
        else 
        {
            return redirect()->back()->with('error', 'Failure: No Image Chosen!!!');
        }
        

        $customtheme->banquet_id = $request->input('banquet_id');
        // Create Post
        $customtheme->save();


        
        return redirect()->back()->with('success', 'Custom Theme Created Successfully!!!');
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customtheme = Customtheme::find($id);
       
        //$customtheme = Customtheme::where('banquet_id', $id);
        //$posts = DB::select('SELECT * FROM posts');
        
        //Check if post exists before deleting
        if (!isset($customtheme)){
            return redirect()->back()->with('error', 'Nothing Found');
        }

        // Check for correct user
        //if(Auth::guard('owner')->user()->id !==$post->owner_id){
        //    return redirect()->back()->with('error', 'Unauthorized Page');
        //}

        if($customtheme->sofa != 'noimage.jpg'){
            // Delete Image
            $string = $customtheme->sofa;
            //$cnt = str_word_count($customtheme->sofa);
            
            $strArray = explode('/',$string);
            $cnt = sizeof($strArray);
            
            $ok = 0;
            while($cnt > $ok)
            {
                Storage::delete('public/cover_images/'.$strArray[$ok]);
                $ok++;
            } 
        }
        
        $customtheme->delete();
        return redirect()->back()->with('success', 'Custom Theme Removed Successfully');
    }

}
