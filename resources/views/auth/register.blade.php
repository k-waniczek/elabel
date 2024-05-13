@extends('layout')
@section('title', 'Register')
@section('content')
    <div class="container">
        <form action="{{route('store')}}" method="POST" class="ms-auto me-auto mt-auto">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="email" class="form-control" name="login">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
        </form>
    </div>
@endsection