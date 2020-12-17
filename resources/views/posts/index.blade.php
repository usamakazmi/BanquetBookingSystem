@extends('layouts.app')
<style>
    .zoom {
      padding: 50px;
      background-color: green;
      transition: transform .2s; /* Animation */
      width: 200px;
      height: 200px;
      margin: 0 auto;
    }
    
    .zoom:hover {
      transform: scale(1.15); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>

<style>
    .button{
background-color: #1c87c9;
-webkit-border-radius: 20px;
border-radius: 20px;
border: none;
color: #eeeeee;
cursor: pointer;
display: inline-block;
font-family: sans-serif; 
font-size: 14px;
padding: 0px 0px;
text-align: center;
text-decoration: none;
width: 80%;
}
@keyframes glowing {
0% { background-color: #2ba805; box-shadow: 0 0 3px skyblue; }
50% { background-color: #49e819; box-shadow: 0 0 10px deepskyblue; }
100% { background-color: #2ba805; box-shadow: 0 0 3px skyblue; }
}

.button {
      animation: glowing 1300ms infinite;
      }
</style>

    
@section('content')
    <h1 class="text-center" style="color:white;font-family:georgia;font-style:italic;font-size:40px">BANQUETS</h1>
    <br>
    <div class="button" style="width: 6.5%">
        <a href="/posts"><input type="button" style="background-image: url('/storage/cover_images/newnew24.jpeg');" class="btn btn-primary" value="View All" ></a>
    </div>
    

    <body>
        <div class="text-center">
        <h3 >Search by</h3>
        <button style="border:transparent;background-image: url('/storage/cover_images/newnew24.jpeg');" class="btn btn-primary" onclick="myFunction1()">Price</button>
        <button style="border:transparent;background-image: url('/storage/cover_images/newnew24.jpeg');" class="btn btn-primary" onclick="myFunction2()">Capacity</button>
        <button style="border:transparent;background-image: url('/storage/cover_images/newnew24.jpeg');" class="btn btn-primary" onclick="myFunction3()">Location</button>
        <button style="border:transparent;background-image: url('/storage/cover_images/newnew24.jpeg');" class="btn btn-primary" onclick="myFunction4()">Name</button>
        
        <br><br>
        </div>
        <!--------------------------------------------------->
        <!-----------------------Price---------------------------->
        <!--------------------------------------------------->
        <div id="myDIV1" class="text-center">    
            {!! Form::open(['action' => 'IndexController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
                           
            <div style="display: inline-block">{{Form::text('p', '', ['style' => 'border-radius: 250px 0px 0px 250px; ',  'placeholder' => 'Price'])}}</div><div style="display: inline-block">{{Form::text('c', '', ['style' => 'border-radius: 0px 0px 0px 0px; ', 'placeholder' => 'Capacity'])}}</div><div style="display: inline-block">{{Form::text('l', '', ['style' => 'border-radius: 0px 0px 0px 0px; ', 'placeholder' => 'Location'])}}</div><div style="display: inline-block">{{Form::text('n', '', ['style' => 'border-radius: 0px 250px 250px 0px;', 'placeholder' => 'Name'])}}</div>
            
            <div class="button" style="width: 6%">
            {{Form::submit('Search', [ 'style' => 'background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'btn btn-primary'])}}
            </div>

            {!! Form::close() !!}
        </div>
        
    
    
    
                
            
    
    </body>
    
    
   
    <br>
    <div class="row">
               
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="column text-center" style="float: left;width: 33.33%; padding: 6px;">
                        <a href="/posts/{{$post->id}}"><img alt="profile Pic" class="zoom"  height="60%" style="border-radius: 20px;
                            background:transparent;
                            padding: 0%;
                            width: 80%;
                            height: 60%;" width="80%" src="/storage/cover_images/{{$post->cover_image}}"></a>
                        <h3><a style="color:white" href="/posts/{{$post->id}}">{{$post->name}}</a></h3>
                        <small style="color:white" >{{$post->location}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Banquets found</p>
    @endif
    </div>
@endsection