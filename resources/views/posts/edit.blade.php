@extends('layouts.app')

@section('content')
<br>
<input type="button" style="background-image: url('/storage/cover_images/newnew20.jpg');" class="btn btn-primary" value="Go back" onclick="history.back()">
    <br><br><br>
    <div class="well" style="border-radius: 80px;">
    
        <h1 class="text-center">Update Banquet Details</h1>
    <br>
        
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('location', 'Location')}}
            {{Form::text('location', $post->location, ['class' => 'form-control', 'placeholder' => 'Location'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', $post->phone, [ 'class' => 'form-control', 'placeholder' => 'Phone'])}}
        </div>
        <div class="form-group">
            {{Form::label('capacity', 'Capacity')}}
            {{Form::text('capacity', $post->capacity, ['class' => 'form-control', 'placeholder' => 'Capacity'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', $post->price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        <div class="form-group">
            {{Form::label('near', 'Near')}}
            {{Form::text('near', $post->near, ['class' => 'form-control', 'placeholder' => 'Near'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover', 'Cover photo')}}
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)', 'class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br><br>
    </div>
@endsection