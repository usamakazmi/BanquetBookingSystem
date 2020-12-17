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
        <div style="display: none" id="myDIV1" class="text-center">    
            {!! Form::open(['action' => 'IndexController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
                           
            <div class="form-group button">
                {{Form::text('p', '', ['style' => 'border-color:#49e819;border-radius:20px', 'class' => 'form-control', 'placeholder' => 'Price'])}}
            </div>
            
           
            <div class="form-group hidden">
                {{Form::text('data', 'price', ['class' => 'form-control', 'placeholder' => 'Banquet_Id'])}}
            </div>
            
           
            {{Form::submit('Search', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    
    
         <!--------------------------------------------------->
        <!-------------------------Capacity-------------------------->
        <!--------------------------------------------------->
        <div style="display: none" id="myDIV2" class="text-center">    
            {!! Form::open(['action' => 'IndexController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
                       
            <div class="form-group button">
                {{Form::text('c', '', ['style' => 'border-color:#49e819;border-radius:20px', 'class' => 'form-control', 'placeholder' => 'Capacity'])}}
            </div>
            
           
            <div class="form-group hidden">
                {{Form::text('data', 'capacity', ['class' => 'form-control', 'placeholder' => 'Banquet_Id'])}}
            </div>
            
           
            {{Form::submit('Search', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
    
        </div>
        
    
        <!--------------------------------------------------->
        <!----------------------Location----------------------------->
        <!--------------------------------------------------->
        <div style="display: none" id="myDIV3" class="text-center">    
            
            {!! Form::open(['action' => 'IndexController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
           
            <div class="form-group button">
                {{Form::text('l', '', ['style' => 'border-color:#49e819;border-radius:20px', 'class' => 'form-control', 'placeholder' => 'Location'])}}
            </div>
            
           
            <div class="form-group hidden">
                {{Form::text('data', 'location', ['class' => 'form-control', 'placeholder' => 'Banquet_Id'])}}
            </div>
            
           
            {{Form::submit('Search', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        
        </div>
        
    
        <!--------------------------------------------------->
        <!-----------------------Name---------------------------->
        <!--------------------------------------------------->
        <div style="display: none" id="myDIV4" class="text-center">    
            {!! Form::open(['action' => 'IndexController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group button">
                {{Form::text('n', '', ['style' => 'border-color:#49e819;border-radius:20px', 'class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            
           
            <div class="form-group hidden">
                {{Form::text('data', 'name', ['class' => 'form-control', 'placeholder' => 'Banquet_Id'])}}
            </div>
            
           
            {{Form::submit('Search', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            </div>
        
    
    
    
                
            <script>
    
            function myFunction1() {
                var x = document.getElementById("myDIV1");
                if (x.style.display === "none") {
                x.style.display = "block";
                } else {
                x.style.display = "none";
                }
                var x2 = document.getElementById("myDIV2");
                var x3 = document.getElementById("myDIV3");
                var x4 = document.getElementById("myDIV4");
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
                
            }
            
            function myFunction2() {
                var x = document.getElementById("myDIV2");
                if (x.style.display === "none") {
                x.style.display = "block";
                } else {
                x.style.display = "none";
                }
                var x2 = document.getElementById("myDIV1");
                var x3 = document.getElementById("myDIV3");
                var x4 = document.getElementById("myDIV4");
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
               
            }
            
            function myFunction3() {
                var x = document.getElementById("myDIV3");
                if (x.style.display === "none") {
                x.style.display = "block";
                } else {
                x.style.display = "none";
                }
                var x2 = document.getElementById("myDIV1");
                var x3 = document.getElementById("myDIV2");
                var x4 = document.getElementById("myDIV4");
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
               
            }
            
            function myFunction4() {
                var x = document.getElementById("myDIV4");
                if (x.style.display === "none") {
                x.style.display = "block";
                } else {
                x.style.display = "none";
                }
                var x2 = document.getElementById("myDIV2");
                var x3 = document.getElementById("myDIV3");
                var x4 = document.getElementById("myDIV1");
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
               
            }
            </script>
    
    
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