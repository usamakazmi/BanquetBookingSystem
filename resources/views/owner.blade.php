  
@extends('layouts.app')

@section('content')
<br><br>
<div class="container" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Owner Dashboard</div>

                <div class="panel-body">
                    <a href="/posts/create" style="border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)" class="btn btn-primary">Create Banquet</a>
                    <h3>Your Banquets</h3>
                    @if(count($posts) > 0)
                    <br>
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            
                            @foreach($posts as $post)
                            
                                <tr>
                                    <td><a href="/posts/{{$post->id}}" >{{$post->name}}</a></td>
                                    <td><a href="/posts/{{$post->id}}/edit" style="border:transparent;background-image: url(/storage/cover_images/newnew20.jpg)" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['style' => 'border:transparent;background-image: url(/storage/cover_images/newnew24.jpeg)','class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no Banquets</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
