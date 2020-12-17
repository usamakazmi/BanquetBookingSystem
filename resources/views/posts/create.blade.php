@extends('layouts.app')

@section('content')
<br>
<input type="button" style="background-image: url('/storage/cover_images/newnew20.jpg');" class="btn btn-primary" value="Go back" onclick="history.back()">
    <br><br><br>
    <div class="well" style="border-radius: 80px;" >
  
    <h1 class="text-center">Create Banquet</h1>
    <br>
    
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('location', 'Location')}}
            {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
        </div>
        <!--'id' => 'article-ckeditor',-->
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <div class="form-group">
            {{Form::label('capacity', 'Capacity')}}
            {{Form::text('capacity', '', ['class' => 'form-control', 'placeholder' => 'Capacity'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group">
            {{Form::label('near', 'Near')}}
            {{Form::text('near', '', [ 'class' => 'form-control', 'placeholder' => 'Near'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover', 'Cover photo')}}
            {{Form::file('cover_image')}}
            <!--{Form::file('cover_image[]', ['multiple' => 'true'])}}-->
       
        </div>
       
        {{Form::submit('Create', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)' , 'class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br><br>
    </div>
@endsection