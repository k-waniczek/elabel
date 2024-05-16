@extends('layout')
@section('title', 'Main Page')
@section('content')

<style>
    .btn-default,
    .btn-default:hover,
    .btn-default:focus {
        color: #333;
        text-shadow: none;
        background-color: #fff;
        border: 1px solid #fff;
    }

    body {
        color: #fff;
        text-align: center;
        text-shadow: 0 1px 3px rgba(0, 0, 0, .5);
        width: 100%;
    }

    .site-wrapper {
        display: table;
        width: 100%;
        height: 100vh;
        background-color: #333;
    }

    .site-wrapper-inner {
        display: table-cell;
        vertical-align: middle;
    }

    .midDiv-container {
        margin-right: auto;
        margin-left: auto;
    }

    .inner {
        padding: 30px;
    }

    .masthead-brand {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .masthead-nav>li {
        display: inline-block;
    }

    .masthead-nav>li+li {
        margin-left: 20px;
    }

    .masthead-nav>li>a {
        padding-right: 0 font-weight: bold;
        color: #fff;
        color: rgba(255, 255, 255, .75);
        border-bottom: 2px solid transparent;
    }

    .masthead-nav>li>a:hover,
    .masthead-nav>li>a:focus {
        background-color: transparent;
        border-bottom-color: rgba(255, 255, 255, .25);
        color: white;
    }

    .masthead-nav>.active>a,
    .masthead-nav>.active>a:hover,
    .masthead-nav>.active>a:focus {
        color: #fff;
        border-bottom-color: #fff;
    }

    @media (min-width: 768px) {
        .masthead-brand {
            float: left;
        }

        .masthead-nav {
            float: right;
        }
    }

    .midDiv {
        padding: 0 20px;
        height: 75vh;
    }

    .midDiv .btn-lg {
        padding: 10px 20px;
        font-weight: bold;
    }
</style>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="container">

            <div class="masthead clearfix">
                <div class="container inner">
                    <h3 class="masthead-brand">Wine Page</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="nav-item"><a class="nav-link" href="http://localhost:8000/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost:8000/register">Register</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner midDiv d-flex justify-content-center align-items-center">
                <div class="box text-center">
                    <h1 class="midDiv-heading">Simple elabel wine page</h1>
                    <p class="lead">This website creates an e-label for wine in accordance with the restrictions from
                        December 8, 2023, which require all wines sold in the EU to have a list of ingredients,
                        regardless of the country of origin.</p>
                    <p class="lead">
                        <a href="#" class="btn btn-lg btn-default">Create elabel for wine</a>
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection