@extends('layout')
@section('title', 'Dashboard')
@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h1>TEST SCSS</h1>
        <div class="card">
            <div class="card-header">Dashboard</div>
            <form id="logout-form" action="{{route('logout')}}" method="POST">
                @csrf
                <input type="submit" class="m-3 btn btn-primary" value="Logout">
            </form>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif              
                <ul>
                    <li><a href="/wines/list">Wines list</a></li>
                    <li><a href="/wines/create">Add wine</a></li>
                    <li><a href="/ingredients/list">Ingredients list</a></li>
                    <li><a href="/ingredients/create">Add ingredient</a></li>    
                </ul>  
            </div>
        </div>
    </div>    
</div>
    
@endsection