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
    
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customer Dashboard</div>

                <div class="panel-body">
                    @component('components.who')
                    @endcomponent
                </div>
 
            </div>
        </div>
    </div>
</div>




<!---->
<!--Checking if user is customer and if he has any bookings-->
@if(Auth::guard('web')->check())

@if(count($customercustombookings) > 0 or count($customerbookings) > 0)
            
@foreach($customercustombookings as $customercustombooking)

@if(Auth::guard('web')->user()->id == $customercustombooking->customer_id)
<br>

<!---->
<!--container For Customer to see his booking details-->
<div id="bookdetail" class="well" style=";border-radius: 100px;">
    
    <h2 class="text-center">Booking Details</h2>

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
    {{Form::label('bill', 'Bill')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->bill!!}
    </div>
    <br>
    {{Form::label('total', 'Total')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customercustombooking->total!!}
    </div>
    <br>

    
    
    

    <!---->
    <!--Cancel button for customer to cancel booking-->
    {!!Form::open(['action' => ['CustomercustombookingController@destroy', Auth::guard('web')->user()->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Cancel Booking', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<br><br><br>


</div>
<hr>
<h1 class="text-center" style="color: white">Booked Items</h1>
<hr>
<?php
    $string = $customercustombooking->pics;
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
<div class="col-md-12"><hr></div>



@endif

@endforeach


       
@foreach($customerbookings as $customerbooking)

@if(Auth::guard('web')->user()->id == $customerbooking->customer_id)
<br>

<!---->
<!--container For Customer to see his booking details-->
<div id="bookdetail" class="well" style="border-radius: 100px;">
    
    <h2 class="text-center">Booking Details</h2>

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
    
    {{Form::label('bill', 'Bill')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->bill!!}
    </div>
    <br>
    {{Form::label('total', 'Total')}}
    <div class="list-group-item" style="border-radius: 20px;color:black;font-family:gothic;font-style:italic;">
        {!!$customerbooking->total!!}
    </div>
    <br>
    <hr>
    
    <hr>
    <!---->
    <!--Cancel button for customer to cancel booking-->
    {!!Form::open(['action' => ['CustomerbookingController@destroy', Auth::guard('web')->user()->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Cancel Booking', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
{!!Form::close()!!}
<br><br><br>


</div>
<hr>
<h1 class="text-center" style="color: white">Booked Items</h1>
<hr>
<?php
    $string = $customerbooking->pics;
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

    <div class="col-md-12"><hr></div>


<hr>

@endif

@endforeach

@endif


@endif




@endsection
