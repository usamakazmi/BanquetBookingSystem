@extends('layouts.app')

@section('content')
<br>

    <div class="jumbotron text-center" style="height: 500px; padding-top: 160px;
    background-image: url('/storage/cover_images/2.jpg');  background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
        <h1 style="color:white;font-style:italic">Welcome To Flamingo</h1>
        <h2 style="color:white;font-style:italic">Online Banquet Booking System</h2>
        <br><br>
               
        <p style="color: white"><a style="border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)" class="btn btn-primary btn-lg" href="/login" role="button">Login</a> or <a style="border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)"  class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    </div>
@endsection