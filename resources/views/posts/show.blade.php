@extends('layout.app')

@section('content')
    <h1>{{$posts->title}}</h1><hr>
    <p>{{$posts->body}}</p>
    <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action' => ['PostController@destroy', $posts->id], 'method' => 'DELETE', 'class' => 'float-right'])!!}
        {{Form::hidden('method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection