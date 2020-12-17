
@extends('layouts.app')



<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 260px;
  height: 215px;
  perspective: 1000px;
  border:0px;border-radius: 20px;
}

.flip-card-inner {
  position: relative;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
 
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 260px;
  height: 215px;
  border:0px;border-radius: 20px;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
</style>


<style>
    .zoom {
      padding: 0px;
      background-color: green;
      transition: transform .2s; /* Animation */
      width: 24%;
      height: 35%;
      margin: 0 auto;
      
    }
    
    .zoom:hover {
      transform: scale(1.35); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>

<style>
    .zoom2 {
      padding: 0px;
      background-color: green;
      transition: transform .2s; /* Animation */
      width: 24%;
      height: 35%;
      margin: 0 auto;
      
    }
    
    .zoom2:hover {
      transform: scale(1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>

<style>
    .button{
background-color: #1c87c9;
-webkit-border-radius: 60px;
border-radius: 60px;
border: none;
color: #eeeeee;
cursor: pointer;
display: inline-block;
font-family: sans-serif; 
font-size: 14px;
padding: 0px 0px;
text-align: center;
text-decoration: none;
width: 75px;
height: 35px;
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




<style>
    html {
      scroll-behavior: smooth;
    }
</style>


<html>

    <style>
        body {
          font-family: "Lato", sans-serif;
        }
        
        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-image: url('/storage/cover_images/newnew15.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;
       
          opacity: 0.95;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }
        
        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 20px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }
        
        .sidenav a:hover {
          color: crimson;
        }
        
        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }
        
        #main {
          transition: margin-left .5s;
          padding: 16px;
        }
        
        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
        </style>
        
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          
          @if(Auth::guard('owner')->check())
            <p style="color:white;font-size: 20px;padding-left:10%">Hello, {{Auth::guard('owner')->user()->name}}</p>

            <a style="font-size:18px" href="#BanquetDetails">View Banquet Details</a>
            <a style="font-size:18px" href="#TimeSlots">Create Time Slots</a>
            <a style="font-size:18px" href="#ViewSlots">View Time Slots</a>
            <a style="font-size:18px" href="#ManualThemes">Create Manual Theme</a>
            <a style="font-size:18px" href="#CustomThemes">Create Custom Theme</a>
            <a style="font-size:18px" href="#ViewManual">View Manual Themes</a>
            <a style="font-size:18px" href="#ViewCustom">View Custom Themes</a>
            <a style="font-size:18px" href="#bott"> View Bookings</a>
            <a style="font-size:18px" href="#ch@t">Chat with Customers</a>
            

            
          @elseif(Auth::guard('web')->check())
            <p style="color:white;font-size: 20px;padding-left:10%">Hello, {{Auth::guard('web')->user()->name}}</p>
            <a style="font-size:18px" href="#{{ $post->id }}">Create Your Own Theme and Book</a>
            <a style="font-size:18px" href="#middle">View Themes</a>
            <a style="font-size:18px" href="#middle">Book Themes</a>
            <a style="font-size:18px" href="#bookdetail">View Booking Details</a>
            <a style="font-size:18px" href="#bookdetail">Cancel Booking</a>
            <a style="font-size:18px" href="#ch@t">Chat with Owner</a>
            

            @endif
          
          
        </div>
        
        
        <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
          document.getElementById('main').setAttribute("style","visibility:hidden");
          document.getElementById('main2').setAttribute("style","visibility:hidden");
  
        }
        function closeNav() {
  
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
          document.getElementById('main').setAttribute("style","visibility:visible")
          document.getElementById('main2').setAttribute("style","visibility:visible")
  
        }
        </script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#chat").click(function(){
                    $("#customerchat").toggle();
            });
            });
        </script>




@section('content')

@if((Auth::guard('web')->check()) or(Auth::guard('owner')->check()))

<a id="main" ><button class="button" onclick="openNav()" style = "position: fixed;top: 40%;left: 0.5%;z-index:750;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 0px 250px 250px 0px;color:white;border:transparent">&#9776; Sidebar</button></a>

<!---->
<!--Sticky Button to jump to Top-->
<a id="main2" href="#top" ><button class="button"  style = "position: fixed;top: 60%;left: 0.5%;z-index:750;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 0px 250px 250px 0px;color:white;border:transparent" >Jump Top</button></a>

@endif


<!---->
<!--Button for owner to View bookings-->
@if(Auth::guard('owner')->check())
@if(Auth::guard('owner')->user()->id == $post->owner_id)

<a href="#bott" class="pull-right" style="padding-top:2.4%;"><button class="button"  style = ";width:110%;z-index:750;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 250px 0px 0px 250px;color:white;border:transparent" >ViewBookings</button></a>

@endif
@endif            

<br>

<!---->
<!--Button to go back a page-->
<a href="/posts" ><button class="button"  style = "z-index:750;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 10%;;color:white;border:transparent" >Go Back</button></a>
<br>
<br>

<!---->
<!--Checking if user is customer and if he has any bookings-->
@if(Auth::guard('web')->check())

@if(count($customercustombookings) > 0 or count($customerbookings) > 0)
            
@foreach($customercustombookings as $customercustombooking)

@if(Auth::guard('web')->user()->id == $customercustombooking->customer_id)
<br>

<!---->
<!--container For Customer to see his booking details-->
<div id="bookdetail" class="well" style="border-radius: 100px;">
    
    <h2 class="text-center">Custom Booking Details</h2>

    {{Form::label('date', 'Date')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->date!!}
    </div>
    <br>

    {{Form::label('starttime', 'Start Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->starttime!!}
    </div>
    <br>
    
    {{Form::label('endtime', 'End Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->endtime!!}
    </div>
  <br>
    {{Form::label('total', 'Total')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->total!!}
    </div>

    <br>
    <a href="/home" ><button class="button"  style = "z-index:750;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 10%;;color:white;border:transparent" >ViewDetails</button></a>


    <!---->
    <!--Cancel button for customer to cancel booking-->
    {!!Form::open(['action' => ['CustomercustombookingController@destroy', Auth::guard('web')->user()->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Cancel Booking', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<br><br><br>


</div>
<hr>

@endif

@endforeach


       
@foreach($customerbookings as $customerbooking)

@if(Auth::guard('web')->user()->id == $customerbooking->customer_id)
<br>

<!---->
<!--container For Customer to see his booking details-->
<div id="bookdetail" class="well" style="border-radius: 100px;">
    
    <h2 class="text-center">Manual Booking Details</h2>

    {{Form::label('date', 'Date')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->date!!}
    </div>
    <br>

    {{Form::label('starttime', 'Start Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->starttime!!}
    </div>
    <br>
    
    {{Form::label('endtime', 'End Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->endtime!!}
    </div>
<br>
    {{Form::label('total', 'Total')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->total!!}
    </div>

    <br>
    <a href="/home" ><button class="button"  style = "z-index:750;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 10%;;color:white;border:transparent" >ViewDetails</button></a>


    <!---->
    <!--Cancel button for customer to cancel booking-->
    {!!Form::open(['action' => ['CustomerbookingController@destroy', Auth::guard('web')->user()->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Cancel Booking', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<br><br><br>


</div>
<hr>

@endif

@endforeach

@endif


@endif

                   
<!---->
<!--COntainer to view Banquet details-->
<br>
    <div >
        <div id="BanquetDetails" class="well" style="border-radius: 5%;width:100%;">
            
        <h1 class="text-center" style="color:Black;">{{$post->name}}</h1>
        <br>
        <img style="border-radius: 5%;
        background: #DC143C;
        width: 100%;
        height: 80%;" src="/storage/cover_images/{{$post->cover_image}}">
        <br>
        <br>
        {{Form::label('location', 'Location')}}
        <div class="list-group-item" style=";border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
            {!!$post->location!!}
        </div>
        <br>
        {{Form::label('phone', 'Phone')}}
        <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
            {!!$post->phone!!}
        </div>
        <br>
        {{Form::label('capacity', 'Capacity')}}
        <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
            {!!$post->capacity!!}
        </div>
        <br>
        {{Form::label('price', 'Booking Price')}}
        <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
            {!!$post->price!!}
        </div>
        <br>
        {{Form::label('near', 'Near')}}
        <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
            {!!$post->near!!}
        </div>
        <br>
        
        
        <br>

        <!---->
        <!--Checking if user is the Owner of the Banquet-->
        @if(Auth::guard('owner')->check())
            @if(Auth::guard('owner')->user()->id == $post->owner_id)
            
            <!---->
            <!--Edit button only owner can see this-->
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary" style="border:transparent;background-image: url('/storage/cover_images/newnew20.jpg');">Edit</a>

            <!---->
            <!--Delete button only owner can see this-->
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                <br>
            <br><br>    
        </div>
    </div>
            <hr>

           <!---->
           <!--Container for Creating time slots-->
           <div>
                <div id="TimeSlots" class="well" style="border-radius: 5%;width:100%;">
                <h2 class="text-center" style="color: black;">Create Booking Time Slots</h2>

                {!! Form::open(['action' => ['BookingsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                {{Form::label('date', 'Date')}}
                <br>
                {{Form::date('date', '', ['style' => 'border-radius: 20px', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                {{Form::label('starttime', 'Start Time')}}
                <br>
                {{Form::time('starttime', '', ['style' => 'border-radius: 20px', 'class' => 'form-control'])}}

                </div>


                <div class="form-group">
                {{Form::label('endtime', 'End Time')}}
                <br>
                {{Form::time('endtime', '', ['style' => 'border-radius: 20px', 'class' => 'form-control'])}}

                </div>
                <br>
                
           <!---->
           <!--Button to create slot-->     
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Create', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)', 'class'=>'btn btn-primary'])}}
                {!! Form::close() !!}

                <br>                       
                <div id="ViewSlots" class="row" >

           <!---->
           <!--Printing all time slots only owner can see-->
                @if(count($bookings) > 0)

                @foreach($bookings as $booking)
                
                    @if($post->id == $booking->banquet_id)
                    <div  class="col-md-3" style="display: inline-block;">

                    <p  class="btn btn-primary" style="width:100%;font-size: 99%">Date: {{$booking->date}}<br>Time: {{$booking->starttime}} to {{$booking->endtime}}</p>
                    <br>
                    
           <!---->
           <!--delete button for time slots only owner can view this-->
                    {!!Form::open(['action' => ['BookingsController@destroy', $booking->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)', 'class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}

                    </div>
                    @endif

                @endforeach
                @endif
                </div> 

                <!--------------------------------------------------------------------------------->
                <!--------------------------------------------------------------------------------->


                <br><br><br>
                </div>
            </div>
            
                <div>

                    <hr>

           <!---->
           <!--Container for creating manual themes-->
        <div>
    
            <div id="ManualThemes" class="well" style="border-radius: 5%;width:100%;">
                <h2 class="text-center" style="color: black;">Create Manual Themes</h2>
                {!! Form::open(['action' => 'ThemesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                   
                    <div class="form-group" style="border-radius: 20px;">
                        {{Form::label('title', 'Theme Title')}}
                        {{Form::text('title', '', ['style' => 'border-radius: 20px', 'class' => 'form-control', 'placeholder' => 'Theme Title Compulsory'])}}
                    </div>
                   


                    <div class="form-group col-md-4" >
                        {{Form::label('sofa', 'Sofa')}}
                        {{Form::file('sofa')}}
                      
                    </div>
                  
                    
                    <div class="form-group col-md-4" >
                        {{Form::label('table', 'Table')}}
                        {{Form::file('table')}}
                      
                    </div>
                   
                    <div class="form-group col-md-4" >
                        {{Form::label('stage', 'Stage')}}
                        {{Form::file('stage')}}
                      
                    </div>
                   
                    <div class="form-group col-md-4" >
                        {{Form::label('carpet', 'Carpet')}}
                        {{Form::file('carpet')}}
                      
                    </div>

                    <div class="form-group col-md-4" >
                        {{Form::label('curtains', 'Curtains')}}
                        {{Form::file('curtains')}}
                      
                    </div>

                    <div class="form-group col-md-4" >
                        {{Form::label('tables', 'Tables')}}
                        {{Form::file('tables')}}
                      
                    </div>

                    <div class="form-group col-md-4" >
                        {{Form::label('chairs', 'Chairs')}}
                        {{Form::file('chairs')}}
                      
                    </div>

                    <div class="form-group col-md-4" >
                        {{Form::label('cover', 'Cover')}}
                        {{Form::file('cover')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('jhoomar', 'Jhoomar')}}
                        {{Form::file('jhoomar')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('lighting', 'Lighting')}}
                        {{Form::file('lighting')}}
                      
                    </div>

                    <div class="form-group col-md-4" >
                        {{Form::label('flowers', 'Flowers')}}
                        {{Form::file('flowers')}}
                      
                    </div>

                    <div class="form-group col-md-4" >
                        {{Form::label('system', 'System')}}
                        {{Form::file('system')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('eatsystem', 'Eating System')}}
                        {{Form::file('eatsystem')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('ventilation', 'Ventilation')}}
                        {{Form::file('ventilation')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('fireworks', 'Fireworks')}}
                        {{Form::file('fireworks')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('music', 'Music')}}
                        {{Form::file('music')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('water', 'Water')}}
                        {{Form::file('water')}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('desert[]', 'Desert(one or more)')}}
                        {{Form::file('desert[]', ['multiple' => 'true'])}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('dinner[]', 'Dinner(one or more)')}}
                        {{Form::file('dinner[]', ['multiple' => 'true'])}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('appetizer[]', 'Appetizer(one or more)')}}
                        {{Form::file('appetizer[]', ['multiple' => 'true'])}}
                      
                    </div>

                    <div class="form-group col-md-4">
                        {{Form::label('drinks[]', 'Drinks(one or more)')}}
                        {{Form::file('drinks[]', ['multiple' => 'true'])}}
                      
                    </div>


                    

                    <div class="form-group hidden">
                        {{Form::label('banquet_id', 'Banquet_Id')}}
                        {{Form::text('banquet_id', $post->id, ['class' => 'form-control', 'placeholder' => 'Banquet_Id'])}}
                    </div>
                    
                   
           <!---->
           <!--button to create theme only owner can see this-->
                    <div class="form-group" style="padding-left:42%">

                    {{Form::submit('Create Theme', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)' ,'class'=>'btn btn-primary'])}}
                        
                    </div>
                    
                {!! Form::close() !!}
                <br>
            </div>
        </div>
<hr>
<!---->
<!--Container for creating custom themes only owner cna see this-->
        <div>
           
            <div id="CustomThemes" class="well" style="border-radius: 5%;width:100%;">
                <h2 class="text-center" style="color: black;">Add Data Into Custom Theme</h2>
                <br>
            {!! Form::open(['action' => 'CustomThemesController@store', 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
                   
                  
 
                    <div class="form-group" style="display: inline-block;padding-left:25%">
                        {{Form::label('sofa', 'Data')}}
                        {{Form::file('sofa[]', ['multiple' => 'true'])}}
                    </div>
                    
                   
                    <div class="form-group hidden">
                        {{Form::label('banquet_id', 'Banquet_Id')}}
                        {{Form::text('banquet_id', $post->id, ['class' => 'form-control', 'placeholder' => 'Banquet_Id'])}}
                    </div>
                    
                   
                   <br><br>
                   
           <!---->
           <!--button to add data into custom theme-->
                    <div class="form-group" style="padding-left:42%">
                    {{Form::submit('Add Data', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)' ,'class'=>'btn btn-primary'])}}
                    </div>

                    {!! Form::close() !!}
                <br>
            </div>
        </div>
            <br>
                           <br>
                           <hr>
                               <h1 class="text-center" style="color:white;font-family:georgia;font-style:italic;font-size:50px">Available Themes</h1>
                           <hr>
            <br><br>

            <div id="ViewManual" class="row">
           
           <!---->
           <!--Printing all manual themes only owner sees this-->
                @if(count($themes) > 0)

                    @foreach($themes as $theme)
                        @if($theme->banquet_id == $post->id)
                        
                        
                        <div class="row" >
                                        <h2 class="text-center" style="color:white;font-family:georgia;font-style:italic;">{{$theme->title}}</h2>
                                        <br>
                                         
                                        @if($theme->sofa != null)
                                        <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->sofa}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Sofa</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->table != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->table}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Table</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->stage != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->stage}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Stage</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->carpet != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->carpet}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Carpet</p>
                                            </div>
                                         </div>
                                         @endif
                                     
                                         @if($theme->curtains != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->curtains}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Curtains</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->tables != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->tables}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Tables</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->chairs != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->chairs}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Chairs</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->cover != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->cover}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Cover</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->jhoomar != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->jhoomar}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Jhoomar</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->lighting != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->lighting}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Lighting</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->flowers != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->flowers}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Flowers</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->system != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->system}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">System</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->eatsystem != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->eatsystem}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Eatingsystem</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->ventilation != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->ventilation}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Ventilation</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->fireworks != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->fireworks}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Fireworks</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->music != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->music}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Music</p>
                                            </div>
                                         </div>
                                         @endif

                                         @if($theme->water != null)
                                         <div  class="col-md-3">
                                            <div class="caption" >
                                                
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                                alt="profile Pic"  src="/storage/cover_images/{{$theme->water}}">
                                                
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Water</p>
                                            </div>
                                         </div>
                                         @endif
                                        
                                        <!---------------------------------------------------------->
                                        <!----------------------Desert------------------------------>
                                        <!---------------------------------------------------------->
                                        
           <!---->
           <!--desert is multi value thus printing like an array-->
                                    @if($theme->desert != null)
                                         
                                       <?php
                                            $string = $theme->desert;
                                            //$cnt = str_word_count($customtheme->sofa);
                                            
                                            $strArray = explode('/',$string);
                                            $cnt = sizeof($strArray);
                                            
                                            $ok = 0;
                                            //echo $cnt - 1;                             

                                        ?>
                                        
                                        @while ($cnt > $ok)
                                            
                                        <div  class="col-md-3">
                                            <div class="caption" >
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                                src="/storage/cover_images/{{$strArray[$ok]}}">
                                                    
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Desert</p>
                                            </div>
                                        
                                            
                                        </div>
                                        
                                            
                                            <?php
                                            $ok ++;
                                            
                                            ?>
                                        @endwhile
                                        
                                    @endif   
                                        <!---------------------------------------------------------->
                                        <!----------------------Dinner------------------------------>
                                        <!---------------------------------------------------------->
                                        
                                        
           <!---->
           <!--dinner is multi value thus printing like an array-->
                                    @if($theme->dinner != null)
                                   
                                        <?php
                                            $string = $theme->dinner;
                                            //$cnt = str_word_count($customtheme->sofa);
                                            
                                            $strArray = explode('/',$string);
                                            $cnt = sizeof($strArray);
                                            
                                            $ok = 0;
                                            //echo $cnt - 1;                             

                                        ?>
                                        
                                        @while ($cnt > $ok)
                                            
                                        <div  class="col-md-3">
                                            <div class="caption" >
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                                src="/storage/cover_images/{{$strArray[$ok]}}">
                                                    
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Dinner</p>
                                            </div>
                                        
                                            
                                        </div>
                                        
                                            
                                            <?php
                                            $ok ++;
                                            
                                            ?>
                                        @endwhile

                                    @endif
                                        <!---------------------------------------------------------->
                                        <!----------------------appetizer------------------------------>
                                        <!---------------------------------------------------------->
                                                                     
           <!---->
           <!--appetizer is multi value thus printing like an array-->
                                    @if($theme->appetizer != null)
                                   
                                        <?php
                                            $string = $theme->appetizer;
                                            //$cnt = str_word_count($customtheme->sofa);
                                            
                                            $strArray = explode('/',$string);
                                            $cnt = sizeof($strArray);
                                            
                                            $ok = 0;
                                            //echo $cnt - 1;                             

                                        ?>
                                        
                                        @while ($cnt > $ok)
                                            
                                        <div  class="col-md-3">
                                            <div class="caption" >
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                                src="/storage/cover_images/{{$strArray[$ok]}}">
                                                    
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Appetizer</p>
                                            </div>
                                        
                                            
                                        </div>
                                        
                                            
                                            <?php
                                            $ok ++;
                                            
                                            ?>
                                        @endwhile
                                    @endif


                                        <!---------------------------------------------------------->
                                        <!----------------------drinks------------------------------>
                                        <!---------------------------------------------------------->
                                                                     
           <!---->
           <!--drinks is multi value thus printing like an array-->
                                    @if($theme->drinks != null)
                                   
                                        <?php
                                            $string = $theme->drinks;
                                            //$cnt = str_word_count($customtheme->sofa);
                                            
                                            $strArray = explode('/',$string);
                                            $cnt = sizeof($strArray);
                                            
                                            $ok = 0;
                                            //echo $cnt - 1;                             

                                        ?>
                                        
                                        @while ($cnt > $ok)
                                            
                                        <div  class="col-md-3">
                                            <div class="caption" >
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                                src="/storage/cover_images/{{$strArray[$ok]}}">
                                                    
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Drinks</p>
                                            </div>
                                        
                                            
                                        </div>
                                        
                                            
                                            <?php
                                            $ok ++;
                                            
                                            ?>
                                        @endwhile
                                    @endif
                                        
                                                
                                         
                                        
                                    
                        </div>
                        
                        <br>
                                                     
           <!---->
           <!--Button to delete manual theme only owner can see this-->
                        {!!Form::open(['action' => ['ThemesController@destroy', $theme->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)', 'class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                        <br>
                        <br>
                        
                        <hr>
                        @endif
                    @endforeach
                    {{$themes->links()}}
                @endif
                </div>
                <br>    

                
            <div id="ViewCustom" class="row">
                                                     
           <!---->
           <!--Printing all custom theme data only owner sees this-->
                @if(count($customthemes) > 0)

                    @foreach($customthemes as $customtheme)
                        @if($customtheme->banquet_id == $post->id)
                        
                        <div class="row" >
                            <h2 class="text-center" style="color:white;font-family:georgia;font-style:italic;">Custom Theme</h2>
                            <br>
                           
                            <?php
                                $string = $customtheme->sofa;
                                //$cnt = str_word_count($customtheme->sofa);
                                
                                $strArray = explode('/',$string);
                                $cnt = sizeof($strArray);
                                
                                $ok = 0;
                                //echo $cnt - 1;                             
                                        
                            ?>
                            
                            @while ($cnt  > $ok)
                                
                            <div  class="col-md-3">
                                <div class="caption" >
                                    <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                    src="/storage/cover_images/{{$strArray[$ok]}}">
                                    @php
                                         $temp = $strArray[$ok];
                                         $temp2 = explode('@',$temp);
                                         $temp3 = explode('_', $temp2[1]);
                                    @endphp 
                                    <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">{{$temp3[0]}}</p>
                                </div>
                            
                                
                            </div>
                            
                                
                                <?php
                                $ok ++;
                                
                                ?>
                            @endwhile
                            
                            
                                    
                        </div>
                                                                  
           <!---->
           <!--button to delete custom theme-->
                        {!!Form::open(['action' => ['CustomThemesController@destroy', $customtheme->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                
                        <br>
                        <br>
                        
                        <hr>
                        
                        @endif
                    @endforeach
                    {{$customthemes->links()}}
                @endif
                </div>

            
        @endif
    @endif
    </div>
                                          
<!---->
<!--checking is user is Customer and hasnt booked anything-->
    @if(Auth::guard('web')->check())
        @if((Auth::guard('web')->user()->bookstat == 0)  )
        <hr>
        <!--a href="#{{ $post->id }}"><button class="btn btn-primary button" style = ";color:white;border:transparent;background-image: url('/storage/cover_images/newnew24.jpeg');" 
            onclick="myFunction2()">Go to: Create Custom Theme</button></a-->
        
        <div>
            @if(count($themes) > 0)

                @foreach($themes as $theme)
                    @if($theme->banquet_id == $post->id)
                    
                    
                    <div id="middle" class="row" >
                                <div>
                                     <div class="text-center" >
                                        <h1 class="text-center" style="color:white;font-family:georgia;font-style:italic;">Manual Themes</h2>
                                        
                                        <h2 class="text-center" style="color:white;font-family:georgia;font-style:italic;">{{$theme->title}}</h2>
                                        
                                         <h3  style=";font-family:georgia;font-style:italic;">*Click a Book button to book the current theme for the respective time slot</h3>       
                                        <br><br>
                                    </div>         
                                        
                                    @if($theme->sofa != null)
                                    <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->sofa}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Sofa</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->table != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->table}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Table</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->stage != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->stage}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Stage</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->carpet != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->carpet}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Carpet</p>
                                        </div>
                                     </div>
                                     @endif
                                 
                                     @if($theme->curtains != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->curtains}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Curtains</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->tables != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->tables}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Tables</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->chairs != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->chairs}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Chairs</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->cover != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->cover}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Cover</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->jhoomar != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->jhoomar}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Jhoomar</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->lighting != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->lighting}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Lighting</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->flowers != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->flowers}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Flowers</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->system != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->system}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">System</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->eatsystem != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->eatsystem}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Eatingsystem</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->ventilation != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->ventilation}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Ventilation</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->fireworks != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->fireworks}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Fireworks</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->music != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->music}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Music</p>
                                        </div>
                                     </div>
                                     @endif

                                     @if($theme->water != null)
                                     <div  class="col-md-3">
                                        <div class="caption" >
                                            
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" 
                                            alt="profile Pic"  src="/storage/cover_images/{{$theme->water}}">
                                            
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Water</p>
                                        </div>
                                     </div>
                                     @endif
                                    
                                    <!---------------------------------------------------------->
                                    <!----------------------Desert------------------------------>
                                    <!---------------------------------------------------------->
                                    @if($theme->desert != null)
                                   
                                    <?php
                                        $string = $theme->desert;
                                        //$cnt = str_word_count($customtheme->sofa);
                                        
                                        $strArray = explode('/',$string);
                                        $cnt = sizeof($strArray);
                                        
                                        $ok = 0;
                                        //echo $cnt - 1;                             

                                    ?>
                                    
                                    @while ($cnt > $ok)
                                        
                                    <div  class="col-md-3">
                                        <div class="caption" >
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                            src="/storage/cover_images/{{$strArray[$ok]}}">
                                                
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Desert</p>
                                        </div>
                                    
                                        
                                    </div>
                                    
                                        
                                        <?php
                                        $ok ++;
                                        
                                        ?>
                                    @endwhile
                                @endif
                                    
                                    
                                    <!---------------------------------------------------------->
                                    <!----------------------Dinner------------------------------>
                                    <!---------------------------------------------------------->
                                    @if($theme->dinner != null)
                                   
                                    <?php
                                        $string = $theme->dinner;
                                        //$cnt = str_word_count($customtheme->sofa);
                                        
                                        $strArray = explode('/',$string);
                                        $cnt = sizeof($strArray);
                                        
                                        $ok = 0;
                                        //echo $cnt - 1;                             

                                    ?>
                                    
                                    @while ($cnt > $ok)
                                        
                                    <div  class="col-md-3">
                                        <div class="caption" >
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                            src="/storage/cover_images/{{$strArray[$ok]}}">
                                                
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Dinner</p>
                                        </div>
                                    
                                        
                                    </div>
                                    
                                        
                                        <?php
                                        $ok ++;
                                        
                                        ?>
                                    @endwhile
                                @endif


                                      <!---------------------------------------------------------->
                                    <!----------------------appetizer------------------------------>
                                    <!---------------------------------------------------------->
                                    @if($theme->appetizer != null)
                                   
                                    <?php
                                        $string = $theme->appetizer;
                                        //$cnt = str_word_count($customtheme->sofa);
                                        
                                        $strArray = explode('/',$string);
                                        $cnt = sizeof($strArray);
                                        
                                        $ok = 0;
                                        //echo $cnt - 1;                             

                                    ?>
                                    
                                    @while ($cnt > $ok)
                                        
                                    <div  class="col-md-3">
                                        <div class="caption" >
                                            <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                            src="/storage/cover_images/{{$strArray[$ok]}}">
                                                
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Appetizer</p>
                                        </div>
                                    
                                        
                                    </div>
                                    
                                        
                                        <?php
                                        $ok ++;
                                        
                                        ?>
                                    @endwhile
                                @endif



                                      <!---------------------------------------------------------->
                                    <!----------------------drinks------------------------------>
                                    <!---------------------------------------------------------->
                                    @if($theme->drinks != null)
                                   
                                        <?php
                                            $string = $theme->drinks;
                                            //$cnt = str_word_count($customtheme->sofa);
                                            
                                            $strArray = explode('/',$string);
                                            $cnt = sizeof($strArray);
                                            
                                            $ok = 0;
                                            //echo $cnt - 1;                             

                                        ?>
                                        
                                        @while ($cnt > $ok)
                                            
                                        <div  class="col-md-3">
                                            <div class="caption" >
                                                <img class="zoom" style="width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                                src="/storage/cover_images/{{$strArray[$ok]}}">
                                                    
                                                <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Drinks</p>
                                            </div>
                                        
                                            
                                        </div>
                                        
                                            
                                            <?php
                                            $ok ++;
                                            
                                            ?>
                                        @endwhile
                                    @endif
                                    </div>
                                    <!------------------------------------------------------------------------------------------>
                                    
                                    <!------------------------------------------------------------------------------------------>
                                    
                                    
                                    <div class="col-md-4">
                                        
                                        @if(count($bookings) > 0)
                        
                                        @foreach($bookings as $booking)
                                        
                                        @if($post->id == $booking->banquet_id)
                                        
                                        <div class="col-md-6">
                        
                                        <p  style=";color:white;font-size: 120%">Date: {{$booking->date}}<br>Time: {{$booking->starttime}} to {{$booking->endtime}}</p>
                                        
                        
                        
                        
                                        
                                        {!! Form::open(['action' => ['CustomerbookingController@update', $theme->banquet_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                            <div class="form-group hidden">
                                                {{Form::text('date',  $booking->date , ['placeholder' => 'Select Date'])}}
                        
                                                {{Form::text('starttime', $booking->starttime , ['placeholder' => 'Select Start Time'])}}
                                                
                                                {{Form::text('endtime',$booking->endtime , ['placeholder' => 'Select End Time'])}}
                                                 
                                                {{Form::text('book_id',$booking->id , ['placeholder' => 'Select End Time'])}}

                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('customer_id', 'Customer_Id')}}
                                                {{Form::text('customer_id', Auth::guard('web')->user()->id )}}
                                            </div>
                                            
                                            
                                            <div class="form-group hidden">
                                                {{Form::label('sofa', 'Sofa')}}
                                                {{Form::text('sofa',  $theme->sofa )}}
                    
                                            </div>
                                            
                                            
                                            <div class="form-group hidden">
                                                {{Form::label('table', 'Table')}}
                                                {{Form::text('table',  $theme->table)}}
                                                
                                            </div>
                                            
                                            <div class="form-group hidden">
                                                {{Form::label('stage', 'Stage')}}
                                                {{Form::text('stage',  $theme->stage)}}
                                                
                                            </div>
                                            
                                            <div class="form-group hidden">
                                                {{Form::label('carpet', 'Carpet')}}
                                                {{Form::text('carpet',  $theme->carpet)}}
                                                
                                            </div>

                                                                    
                                            <div class="form-group hidden">
                                                {{Form::label('curtains', 'Curtains')}}
                                                {{Form::text('curtains',  $theme->curtains)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('tables', 'Tables')}}
                                                {{Form::text('tables',  $theme->tables)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('chairs', 'Chairs')}}
                                                {{Form::text('chairs',  $theme->chairs)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('cover', 'Cover')}}
                                                {{Form::text('cover',  $theme->cover)}}
                                            
                                            </div>
 
                                            <div class="form-group hidden">
                                                {{Form::label('jhoomar', 'Jhoomar')}}
                                                {{Form::text('jhoomar',  $theme->jhoomar)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('lighting', 'Lighting')}}
                                                {{Form::text('lighting',  $theme->lighting)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('flowers', 'Flowers')}}
                                                {{Form::text('flowers',  $theme->flowers)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('system', 'System')}}
                                                {{Form::text('system',  $theme->system)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('eatsystem', 'Eating System')}}
                                                {{Form::text('eatsystem',  $theme->eatsystem)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('ventilation', 'Ventilation')}}
                                                {{Form::text('ventilation',  $theme->ventilation)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('fireworks', 'Fireworks')}}
                                                {{Form::text('fireworks',  $theme->fireworks)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('music', 'Music')}}
                                                {{Form::text('music',  $theme->music)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('water', 'Water')}}
                                                {{Form::text('water',  $theme->water)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('desert', 'Desert')}}
                                                {{Form::text('desert',  $theme->desert )}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('dinner', 'Dinner')}}
                                                {{Form::text('dinner',  $theme->dinner )}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('appetizer', 'Appetizer')}}
                                                {{Form::text('appetizer',  $theme->appetizer)}}
                                            
                                            </div>

                                            <div class="form-group hidden">
                                                {{Form::label('drinks', 'Drinks')}}
                                                {{Form::text('drinks',  $theme->drinks)}}
                                            
                                            </div>



                                            <br>
                                                                                      
           <!---->
           <!--book button for manual theme-->
                                            {{Form::hidden('_method','PUT')}}

                                            {{Form::submit('Book', [ 'style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'button'])}}
                                        {!! Form::close() !!}

                                        <hr>
                                            
                                        </div>
                                        @endif
                        
                                        @endforeach
                                        @endif
                                        </div> 
                                     
                                    
                                
                    </div>
                    
                    

                    <hr>
                    @endif
                @endforeach
                {{$themes->links()}}
            @endif
            
        </div>
         
                <br>    
                <!------------------------------------------------------------------------------------------->
                <!------------------------------------------------------------------------------------------->
                <!--a href="#middle"><button class="btn btn-primary button" style = ";color:white;border:transparent;background-image: url('/storage/cover_images/newnew24.jpeg');" onclick="myFunction2()">Go to: Select a Manual Theme</button></a-->
        
                           
                <div>
                        @if(count($customthemes) > 0)
                        <div class="text-center" >
                        <h2 id="{{ $post->id }}" class="text-center" style="color:white;font-family:georgia;font-style:italic;">Custom Theme</h2>
                        <h3  style=";font-family:georgia;font-style:italic;">*Click the add button under any image to add it in your package, then add the time slot required then book button to confirm booking</h3>       
                        
                        <br>
                        </div>         
                            @foreach($customthemes as $customtheme)
                                @if($customtheme->banquet_id == $post->id)
                                    
                                <div  class="row" >
                                    <br>
                                
                                    <?php
                                        $string = $customtheme->sofa;
                                        //$cnt = str_word_count($customtheme->sofa);
                                        
                                        $strArray = explode('/',$string);
                                        $cnt = sizeof($strArray);
                                        
                                        $i = 0;
                                        //echo $cnt - 1;
                                        $save = '';                             

                                    ?>
                                    
                                    @while ($cnt  > $i)
                                        
                                    <div  class="col-md-3">
                                        <div class="caption" >
                                            <img  style="height:215px;width:260px;border:0px;border-radius: 20px;" alt="profile Pic"  
                                            src="/storage/cover_images/{{$strArray[$i]}}">
                                            @php
                                                $temp = $strArray[$i];
                                                $temp2 = explode('@',$temp);
                                                $temp3 = explode('_', $temp2[1]);
                                            @endphp 
                                            <p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">{{$temp3[0]}}</p>
                                       
                                        
                                            <!--p class="text-center" style="width:260px;color:white;border-radius: 20px;background-image: url(/storage/cover_images/newnew24.jpeg);font-family:georgia;font-style:italic;font-size:15px">Sofa</p-->
                                
                                            
                                            <html>
                                            <body>
                                            <form class="text-center" onsubmit="return false;">
                                                <div class="form-group hidden">
                                                    <input class="btn btn-primary" value="empty" type="text" id="userInput" />
                                                </div>
                                                <button style=";border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)" class="btn btn-primary"  value="{{$strArray[$i]}}" type="submit" onclick="othername()" >Add</button>
                                                <hr>           
                                                
                                            </form>
                                            
                                            
                                            <script>
                                                 input = '';
                                                
                                                function othername() {
                                                    if(input == "")
                                                    {
                                                        input = event.target.value;
                                                        //event.target.style.transform = "scale(1.1)";
                                                        //event.target.style.transition = "transform 0.25s ease"; 

                                                    }
                                                    else
                                                    {
                                                        input = input +'/'+ event.target.value;
                                                        //event.target.style.transform = "scale(1.1)";
                                                        //event.target.style.transition = "transform 0.25s ease"; 

                                                    }
                                               
                                                     alert('Selected');
                                                    document.getElementById("myLink").innerHTML=input;
                                                    var inputF = document.getElementById("id1");
                                                    inputF.value = input;
                                                }
                                            </script>
                                           
                                           
                                            </body>    
                                            </html>
                                           
                                        </div>
                                    
                                        
                                    </div>
                                    
                                        
                                        <?php
                                        $i ++;
                                        
                                        ?>
                                    @endwhile

                                    
                                
                                @endif
                                
                            @endforeach
                           
                            </div>
                            {{$customthemes->links()}}
                        @endif
                        </div>
                        <div>
                                            

                            @if(count($bookings) > 0 and count($customthemes) > 0)
            
                            @foreach($bookings as $booking)
                            
                            @if($post->id == $booking->banquet_id)
                            
                            <div class="col-md-2">
            
                            <p  style=";color:white;font-size: 120%">Date: {{$booking->date}}<br>Time: {{$booking->starttime}} to {{$booking->endtime}}</p>
                            
                                <!--Display selected>
                                <body>
                                    <p id="myLink"></p>
                                </body-->

                                
                                <html>
                                    <body>
                                    <form class="text-center" onsubmit="return false;">
                                        <div class="form-group hidden">
                                            <input class="btn btn-primary" value="empty" type="text" id="userInput" />
                                        </div>           
                                        <button style=";border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)" class="btn btn-primary"  value="{{$booking->date}}/{{$booking->starttime}}/{{$booking->endtime}}/{{$booking->id}}" type="submit" onclick="oothername()" >Add</button>
                                        
                                    </form>
                                    
                                    
                                    <script>
                                        
                                        inp = '';
                                        function oothername() {
                                                if(input == '')
                                                {
                                                    alert('Choose an image first');
                                                }
                                                else
                                                {
                                                    inp = '/' + event.target.value ;
                                                    document.getElementById('id1').value =input;
                                                    alert(input +'to' +inp);
                                                    //document.getElementById("myLink").innerHTML=inp;
                                                    var inpF = document.getElementById("id2");
                                                    inpF.value = inp;
                                                    document.getElementById('id1').value =input; 
                                                }
                                        
                                        }
                                    </script>
                                   
                                   
                                    </body>    
                                    </html>
                         

                            <hr>
                                
                                
                            </div>
                            @endif
            
                            @endforeach
                            @endif
                            </div>
                       
                        @if(count($customthemes) > 0)
            
                            {!! Form::open(['action' => ['CustomercustombookingController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                       

                                <div class="form-group hidden">
                                    {{Form::text('customer_id', Auth::guard('web')->user()->id )}}
                                </div>
                                
                                
                                    
                                            
                                <div class="form-group hidden">
                                    {{Form::text('pics', '', ['id' => 'id1'] )}}
                                    <!--input  name="pics" type="text" id="id1" /-->
                                             
                                </div>
                                

                                   
                                <div class="form-group hidden">
                                    {{Form::text('data',  '' , ['id' => 'id2'])}}
            
                                    <!--
                                    {Form::text('starttime', $booking->starttime , ['placeholder' => 'Select Start Time'])}}
                                    
                                    {Form::text('endtime',$booking->endtime , ['placeholder' => 'Select End Time'])}}
                                    
                                    {Form::text('book_id',$booking->id , ['placeholder' => 'Select End Time'])}}
                                    -->
                                </div>

                                <div class="form-group hidden">
                                    {{Form::label('customer_id', 'Customer_Id')}}
                                    {{Form::text('customer_id', Auth::guard('web')->user()->id )}}
                                </div>

                                <!-------------------------------------------------->
                                
                                <!-------------------------------------------------->
                                                                      
           <!---->
           <!--book button for custom theme-->
                        <div class="col-md-12">
                            {{Form::hidden('_method','PUT')}}
                            
                            {{Form::submit('Book', [ 'style' => ';border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)' ,'class'=>'button'])}}
                            {!! Form::close() !!}
                            <br>   
                            <hr>
                            
                        </div>
                        @endif
                             
                        
                                
                                
                    @endif
                    @endif
                    
                    
        <!------------------------------------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------->

<div id="ch@t" class="col-md-12">
    <hr>
        <!--Customer chat-->
@if(Auth::guard('web')->check())

<div class="well">
    <h1 class="text-center">Chat</h1>
    {!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group" hidden>
            {{Form::text('from', Auth::guard('web')->user()->id.'c', ['class' => 'form-control'])}}
        </div>
        <div class="form-group" hidden>
            {{Form::text('to', $post->owner_id.'o', ['class' => 'form-control'])}}
        </div>
        <div class="form-group" hidden>
            {{Form::text('banquet_id', $post->id, ['class' => 'form-control'])}}
        </div>
        
        
        <div class="form-group" style="height: 100px">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'style' => 'height:50%'])}}
        </div>
      
        {{Form::submit('Submit', ['class'=>'btn btn-primary', 'style'=>'background-image: url("/storage/cover_images/newnew24.jpeg");border-radius: 10%;;color:white;border:transparent'])}}
       {!! Form::close() !!}
       <div style="display: inline-block">
       <button class="pull-right" id="chat" style = "height:34px;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 7%;;color:white;border:transparent" >Show/HideMessages</button>
        </div>

        <div id="customerchat" hidden>

        <br>
        @if(count($messages) > 0)
                    
            @foreach($messages as $message)
                @if($message->from == $post->owner_id.'o'  and $message->banquet_id == $post->id)
                    <div class="form-group" style=";text-align: right; width:100%;padding-left:40%">
                        {{Form::label('body', 'From Owner')}}
                        {{Form::text('text', $message->text, ['class' => 'form-control'])}}
                        <p class="text-center">{{$message->created_at}}</p>
          
                    </div>
                @endif
                
                @if($message->from == Auth::guard('web')->user()->id.'c'  and $message->banquet_id == $post->id)
                <div class="form-group"  style="text-align: left; width:100%;padding-right:40%">
                    {{Form::label('body', 'From You')}}
                    {{Form::text('text', $message->text, ['class' => 'form-control'])}}
                    <p class="text-center">{{$message->created_at}}</p>
                </div>
                @endif
                
                
            @endforeach
        @endif
        </div>

</div>

@endif   
<!--customer chat end-->

<!--Owner chat-->
@if(Auth::guard('owner')->check())

<div class="well">
    <h1 class="text-center">Chat</h1>
    {!! Form::open(['action' => 'MessagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group" hidden>
            
            {{Form::text('from', Auth::guard('owner')->user()->id.'o', ['class' => 'form-control'])}}
        </div>
        <div class="form-group" >
            {{Form::label('to', 'To')}}
           
            {{Form::text('to', '', ['class' => 'form-control', 'placeholder' => 'Reciever id'])}}
        </div>
        <div class="form-group" hidden>
            {{Form::text('banquet_id', $post->id, ['class' => 'form-control'])}}
        </div>
        
        <div class="form-group" style="height: 100px">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'style' => 'height:50%'])}}
        </div>
      
        {{Form::submit('Submit', ['class'=>'btn btn-primary', 'style'=>'background-image: url("/storage/cover_images/newnew24.jpeg");border-radius: 10%;;color:white;border:transparent'])}}
       {!! Form::close() !!}
       <div style="display: inline-block">
       <button class="pull-right" id="chat" style = "height:34px;background-image: url('/storage/cover_images/newnew24.jpeg');border-radius: 7%;;color:white;border:transparent" >Show/HideMessages</button>
        </div>

        <div id="customerchat" hidden>

        <br>
        @if(count($messages) > 0)
                    
            @foreach($messages as $message)
               
            @if($message->from == Auth::guard('owner')->user()->id.'o' and $message->banquet_id == $post->id)
                <div class="form-group"  style="text-align: left; width:100%;padding-right:40%">
                
                    {{Form::label('body', 'You to '.$message->to)}}
                    {{Form::text('text', $message->text, ['class' => 'form-control'])}}
                    <p class="text-center">{{$message->created_at}}</p>
          
                </div>
                @endif
                    
            @if($message->from != Auth::guard('owner')->user()->id.'o'  and $message->banquet_id == $post->id)
                <div class="form-group" style="text-align: right; width:100%;padding-left:40%">
                    {{Form::label('body', 'From '.$message->from)}}
                    {{Form::text('text', $message->text, ['class' => 'form-control'])}}
                    <p class="text-center">{{$message->created_at}}</p>
          
                </div>
                @endif
                
                
                
                
            @endforeach
        @endif
        </div>

</div>

@endif   
<!--owner chat end-->
<hr>
</div>


       
                                          
<!---->
<!--container to view all customer bookings only owner can see this-->

<div id="bott">
@if(Auth::guard('owner')->check())
@if(Auth::guard('owner')->user()->id == $post->owner_id)

<h1 class="text-center" style="color:white;font-family:georgia;font-style:italic;font-size:50px">Bookings</h1>
<hr> 
@if ($customerbookings = 'null' and $customercustombookings = 'null')
<h3 class="text-center" style="color: white">No bookings</h3>
<br>

<br>
@else

@foreach($customercustombookings as $customercustombooking)

<div class="well" style="border-radius: 100px;">
    
    <h2 class="text-center">Custom Booking Details</h2>

    {{Form::label('id', 'Customer ID')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->customer_id!!}
    </div>
   


    {{Form::label('date', 'Date')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->date!!}
    </div>
   

    {{Form::label('starttime', 'Start Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->starttime!!}
    </div>
    
    
    {{Form::label('endtime', 'End Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->endtime!!}
    </div>
  
    {{Form::label('total', 'Total')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->total!!}
    </div>
    <br>
<br>
@endforeach


       
@foreach($customerbookings as $customerbooking)

<div class="well" style="border-radius: 100px;">
    
    <h2 class="text-center">Manual Booking Details</h2>

    
    {{Form::label('id', 'Customer ID')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->customer_id!!}
    </div>
    


    {{Form::label('date', 'Date')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->date!!}
    </div>
   

    {{Form::label('starttime', 'Start Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->starttime!!}
    </div>
   
    
    {{Form::label('endtime', 'End Time')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->endtime!!}
    </div>

    {{Form::label('total', 'Total')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->total!!}
    </div>
  
    <br><br>


</div>
<hr>
@endforeach
        
@endif
@endif
@endif
</div>


@endsection

</html>
