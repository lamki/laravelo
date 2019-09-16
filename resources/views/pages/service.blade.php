@extends('layout.app')

@section('content')
<h1>{{$title}}</h1>
<h4>Our Services Include</h4>
@if(count($content) > 0)
    <ul class="list-group">
    @foreach ($content as $cont)
        <li class="list-group-item">{{$cont}}</li>
    @endforeach
    </ul>
@endif
{{-- <h3 class="pt-2">Total Price is: </h3>{{$price}} --}}
@endsection