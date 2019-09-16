@extends('layout.app')

@section('content')
    <h3>This is a post page</h3>
    @if (count($post) > 0)
        @foreach ($post as $pst)
            <div class="well">
                <h3><a href="/posts/{{$pst->id}}">{{$pst->title}}</a></h3>
                <small>at : {{$pst->created_at}}</small>
            </div>
        @endforeach
    @else
        <h1>No Post</h1>
    @endif
    
@endsection