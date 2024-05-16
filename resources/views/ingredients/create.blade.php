@extends('layout')
@section('title', 'Add an ingredient')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add an ingredient</div>
                <div class="card-body">
                    <form action="{{ route('ingredients.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="The name of the ingredient">
                        </div>
                        <div class="col-sm">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                @foreach (config('app.ingredient_categories') as $category)
                                    <option value="{{$category}}">{{$category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="enumber" class="form-label">E-Number</label>
                            <input type="number" class="form-control" id="enumber" name="enumber" placeholder="Ingredients E-Number">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="allergen" name="allergen">
                            <label class="form-check-label" for="allergen">
                                Allergen
                            </label>
                        </div>
                        <div class="mb-3 mt-4 row gap-2">
                            <button class="btn btn-outline-secondary col" type="reset" onclick="window.location.replace('../dashboard');">Cancel</button>
                            <button class="btn btn-primary col" type="submit">Add ingredient</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection