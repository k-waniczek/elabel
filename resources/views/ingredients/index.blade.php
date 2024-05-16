@extends('layout')
@section('title', 'Wines List')
@section('content')
<ul>
@foreach ($wines as $wine)
    <li>{{$wine->name}}</li>
@endforeach
</ul>
@endsection