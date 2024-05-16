@extends('layout')
@section('title', 'Ingredients List')
@section('content')
<ul>
@foreach ($ingredients as $ingredient)
    <li>{{$ingredient->name}}</li>
@endforeach
</ul>
@endsection