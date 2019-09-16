@extends('layout.app')

@section('content')

<h1>{{$title}}</h1>
<hr>
<p>This page is for Sales Representative from ABC Inc.</p>
    @if (Auth::guest())
        Click <a href="/login">here</a> to login!
    @endif
<br><br>
<h1>News</h1>
<hr>
<p>Slower market projection for next quater! Buckle up buddy!</p>
@endsection
