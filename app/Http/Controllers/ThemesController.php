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

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::orderBy('created_at','desc')->paginate(10);
        return view('posts.addtheme')->with('themes', $themes);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.addtheme');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'title' => 'required|string|max:255',
            
            'sofa' => 'nullable|image|max:1999',
            'table' => 'nullable|image|max:1999',
            'stage' => 'nullable|image|max:1999',
            'carpet' => 'nullable|image|max:1999',
            
            'curtains' => 'nullable|image|max:1999',
            'tables' => 'nullable|image|max:1999',
            'chairs' => 'nullable|image|max:1999',
            'cover' => 'nullable|image|max:1999',
            'jhoomar' => 'nullable|image|max:1999',
            'lighting' => 'nullable|image|max:1999',
            'flowers' => 'nullable|image|max:1999',
            'system' => 'nullable|image|max:1999',
            'eatsystem'=> 'nullable|image|max:1999',
            'ventilation'=> 'nullable|image|max:1999',
            'fireworks'=> 'nullable|image|max:1999',
            'music'=> 'nullable|image|max:1999',
            'water'=> 'nullable|image|max:1999',

            'desert[]'=> 'nullable|image|max:1999',
            'dinner[]'=> 'nullable|image|max:1999',
            'appetizer[]'=> 'nullable|image|max:1999',
            'drinks[]'=> 'nullable|image|max:1999',
            
            'banquet_id' => 'required|integer',
            
        ]);
        $theme = new Theme;
        
        //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('sofa')){
            // Get filename with the extension
            $filenameWithExt = $request->file('sofa')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('sofa')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('sofa')->storeAs('public/cover_images', $fileNameToStore);
 
            $theme->sofa = $fileNameToStore;

        }

      
        //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('table')){
            // Get filename with the extension
            $filenameWithExt = $request->file('table')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('table')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('table')->storeAs('public/cover_images', $fileNameToStore);
       
            $theme->table = $fileNameToStore;
       
        }
        
       
        //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('stage')){
            // Get filename with the extension
            $filenameWithExt = $request->file('stage')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('stage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('stage')->storeAs('public/cover_images', $fileNameToStore);
        
            $theme->stage = $fileNameToStore;
       
        } 
        
        
        //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('carpet')){
            // Get filename with the extension
            $filenameWithExt = $request->file('carpet')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('carpet')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('carpet')->storeAs('public/cover_images', $fileNameToStore);

            $theme->carpet = $fileNameToStore;

        } 
        
       
         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('curtains')){
            // Get filename with the extension
            $filenameWithExt = $request->file('curtains')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('curtains')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('curtains')->storeAs('public/cover_images', $fileNameToStore);

            $theme->curtains = $fileNameToStore;

        } 


         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('tables')){
            // Get filename with the extension
            $filenameWithExt = $request->file('tables')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('tables')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('tables')->storeAs('public/cover_images', $fileNameToStore);
        
            $theme->tables = $fileNameToStore;

        } 

         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('chairs')){
            // Get filename with the extension
            $filenameWithExt = $request->file('chairs')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('chairs')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('chairs')->storeAs('public/cover_images', $fileNameToStore);

            $theme->chairs = $fileNameToStore;

        } 


         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('cover')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover')->storeAs('public/cover_images', $fileNameToStore);

            $theme->cover = $fileNameToStore;


        } 

      

         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('jhoomar')){
            // Get filename with the extension
            $filenameWithExt = $request->file('jhoomar')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('jhoomar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('jhoomar')->storeAs('public/cover_images', $fileNameToStore);

            $theme->jhoomar = $fileNameToStore;

        } 

        

         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('lighting')){
            // Get filename with the extension
            $filenameWithExt = $request->file('lighting')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('lighting')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('lighting')->storeAs('public/cover_images', $fileNameToStore);

            $theme->lighting = $fileNameToStore;
        } 

       


         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('flowers')){
            // Get filename with the extension
            $filenameWithExt = $request->file('flowers')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('flowers')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('flowers')->storeAs('public/cover_images', $fileNameToStore);

            $theme->flowers = $fileNameToStore;

        } 

        

         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('system')){
            // Get filename with the extension
            $filenameWithExt = $request->file('system')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('system')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('system')->storeAs('public/cover_images', $fileNameToStore);

            $theme->system = $fileNameToStore;
        } 

        


         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('eatsystem')){
            // Get filename with the extension
            $filenameWithExt = $request->file('eatsystem')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('eatsystem')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('eatsystem')->storeAs('public/cover_images', $fileNameToStore);

            
            $theme->eatsystem = $fileNameToStore;

        } 


         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('ventilation')){
            // Get filename with the extension
            $filenameWithExt = $request->file('ventilation')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('ventilation')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('ventilation')->storeAs('public/cover_images', $fileNameToStore);

            $theme->ventilation = $fileNameToStore;
        } 

   


         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('fireworks')){
            // Get filename with the extension
            $filenameWithExt = $request->file('fireworks')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('fireworks')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('fireworks')->storeAs('public/cover_images', $fileNameToStore);

            $theme->fireworks = $fileNameToStore;

        }

      

         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('music')){
            // Get filename with the extension
            $filenameWithExt = $request->file('music')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('music')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('music')->storeAs('public/cover_images', $fileNameToStore);

            $theme->music = $fileNameToStore;

        } 

        

         //-----------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------------
        // Handle File Upload
        if($request->hasFile('water')){
            // Get filename with the extension
            $filenameWithExt = $request->file('water')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('water')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('water')->storeAs('public/cover_images', $fileNameToStore);

            
            $theme->water = $fileNameToStore;


        } 

        ////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        
        if($request->hasFile('desert'))
        {
            foreach($request->file('desert') as $file)
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
            if($theme->desert!=null)
            {
                $theme->desert = $fileNameToStore.'/'.$theme->desert;
           
            }   
            elseif($theme->desert==null)
            {
                $theme->desert = $fileNameToStore;
                
            }
            
            }
        } 
      
        
        ////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        
        if($request->hasFile('dinner'))
        {
            foreach($request->file('dinner') as $file2)
            {

            // Get filename with the extension
            $filenameWithExt2 = $file2->getClientOriginalName();
            // Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $file2->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename2.'_'.time().'.'.$extension2;
            // Upload Image
            $path2 = $file2->storeAs('public/cover_images', $fileNameToStore2);
            
            // Create Post
            //$customtheme->sofa = $fileNameToStore.$customtheme->sofa;
            if($theme->dinner!=null)
            {
                $theme->dinner = $fileNameToStore2.'/'.$theme->dinner;
                
            }
            elseif($theme->dinner==null)
            {
                $theme->dinner = $fileNameToStore2;
                
            }
            
            
            }
        } 
     
        
        ////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        
        if($request->hasFile('appetizer'))
        {
            foreach($request->file('appetizer') as $file3)
            {

            // Get filename with the extension
            $filenameWithExt3 = $file3->getClientOriginalName();
            // Get just filename
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $file3->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3= $filename3.'_'.time().'.'.$extension3;
            // Upload Image
            $path3 = $file3->storeAs('public/cover_images', $fileNameToStore3);
            
            // Create Post
            //$customtheme->sofa = $fileNameToStore.$customtheme->sofa;
            if($theme->appetizer!=null)
            {
                $theme->appetizer = $fileNameToStore3.'/'.$theme->appetizer;
                
            }
            elseif($theme->appetizer==null)
            {
                $theme->appetizer = $fileNameToStore3;
                
            }
            
            
            }
        } 
     

        
        ////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        
        if($request->hasFile('drinks'))
        {
            foreach($request->file('drinks') as $file4)
            {

            // Get filename with the extension
            $filenameWithExt4 = $file4->getClientOriginalName();
            // Get just filename
            $filename4 = pathinfo($filenameWithExt4, PATHINFO_FILENAME);
            // Get just ext
            $extension4 = $file4->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore4= $filename4.'_'.time().'.'.$extension4;
            // Upload Image
            $path4 = $file4->storeAs('public/cover_images', $fileNameToStore4);
            
            // Create Post
            //$customtheme->sofa = $fileNameToStore.$customtheme->sofa;
            if($theme->drinks!=null)
            {
                $theme->drinks = $fileNameToStore4.'/'.$theme->drinks;
                
            }
            elseif($theme->drinks==null)
            {
                $theme->drinks = $fileNameToStore4;
                
            }
            
            
            }
        } 
     
        



        $theme->banquet_id = $request->input('banquet_id');
        $theme->title = $request->input('title');
        // Create Post
        $theme->save();

        return redirect()->back()->with('success', 'Theme Creation Successful');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::find($id);
        //Check if post exists before deleting
        if (!isset($theme)){
            return redirect()->back()->with('error', 'Nothing Found');
        }

        // Check for correct user
        //if(Auth::guard('owner')->user()->id !==$post->owner_id){
        //    return redirect()->back()->with('error', 'Unauthorized Page');
        //}

        if($theme->sofa != 'noimage.jpg'){
            // Delete Image1
            Storage::delete('public/cover_images/'.$theme->sofa);
        }

        if($theme->table != 'noimage.jpg'){
            // Delete Image2
            Storage::delete('public/cover_images/'.$theme->table);
        }

        if($theme->stage != 'noimage.jpg'){
            // Delete Image3
            Storage::delete('public/cover_images/'.$theme->stage);
        }

        if($theme->carpet != 'noimage.jpg'){
            // Delete Image21
            Storage::delete('public/cover_images/'.$theme->carpet);
        }


        if($theme->curtains != 'noimage.jpg'){
            // Delete Image4
            Storage::delete('public/cover_images/'.$theme->curtains);
        }

        if($theme->tables != 'noimage.jpg'){
            // Delete Image5
            Storage::delete('public/cover_images/'.$theme->tables);
        }

        if($theme->chairs != 'noimage.jpg'){
            // Delete Image6
            Storage::delete('public/cover_images/'.$theme->chairs);
        }

        if($theme->cover != 'noimage.jpg'){
            // Delete Image7
            Storage::delete('public/cover_images/'.$theme->cover);
        }

        if($theme->jhoomar != 'noimage.jpg'){
            // Delete Image8
            Storage::delete('public/cover_images/'.$theme->jhoomar);
        }

        if($theme->lighting != 'noimage.jpg'){
            // Delete Image9
            Storage::delete('public/cover_images/'.$theme->lighting);
        }

        if($theme->flowers != 'noimage.jpg'){
            // Delete Image10
            Storage::delete('public/cover_images/'.$theme->flowers);
        }

        if($theme->system != 'noimage.jpg'){
            // Delete Image11
            Storage::delete('public/cover_images/'.$theme->system);
        }

        if($theme->eatsystem != 'noimage.jpg'){
            // Delete Image12
            Storage::delete('public/cover_images/'.$theme->eatsystem);
        }

        if($theme->ventilation != 'noimage.jpg'){
            // Delete Image13
            Storage::delete('public/cover_images/'.$theme->ventilation);
        }

        if($theme->fireworks != 'noimage.jpg'){
            // Delete Image14
            Storage::delete('public/cover_images/'.$theme->fireworks);
        }

        if($theme->music != 'noimage.jpg'){
            // Delete Image15
            Storage::delete('public/cover_images/'.$theme->music);
        }

        if($theme->water != 'noimage.jpg'){
            // Delete Image16
            Storage::delete('public/cover_images/'.$theme->water);
        }

        if($theme->desert != 'noimage.jpg'){
            // Delete Image17
            $string = $theme->desert;
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

        if($theme->dinner != 'noimage.jpg'){
            // Delete Image18
            $string = $theme->dinner;
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

        if($theme->appetizer != 'noimage.jpg'){
            // Delete Image19
            $string = $theme->appetizer;
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

        if($theme->drinks != 'noimage.jpg'){
            // Delete Image20
            $string = $theme->drinks;
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
        
        $theme->delete();
        return redirect()->back()->with('success', 'Theme Removed Successfully');
    
    }
}
