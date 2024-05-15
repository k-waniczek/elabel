@extends('layout')
@section('title', 'Add a wine')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add a wine</div>
                <div class="card-body">
                    <form action="{{ route('wines.store') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            Name
                            <input type="text" name="name">
                        </div>
                        <div class="mb-3 row">
                            Volume
                            <input type="number" name="volume">
                        </div>
                        <div class="mb-3 row">
                            Weight
                            <input type="number" name="weight">
                        </div>
                        <div class="mb-3 row">
                            Vintage
                            <input type="number" name="vintage">
                        </div>
                        <div class="mb-3 row">
                            Type
                            <select name="type">
                                @foreach (config('app.wine_types') as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 row">
                            Style
                            <select name="style">
                                @foreach (config('app.wine_styles') as $style)
                                    <option value="{{$style}}">{{$style}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 row">
                            Sugar content
                            <select name="sugar_content">
                                @foreach (config('app.wine_sugar_contents') as $sc)
                                    <option value="{{$sc}}">{{$sc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 row">
                            Packaging gases
                            <select name="packaging_gases">
                                @foreach (config('app.gases') as $pg)
                                    <option value="{{$pg}}">{{$pg}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 row">
                            Appelation
                            <input type="text" name="appelation">
                        </div>
                        <div class="mb-3 row">
                            Portion volume
                            <input type="number" name="portion_volume">
                        </div>
                        <div class="mb-3 row">
                            Alcohol
                            <input type="number" name="alcohol">
                        </div>
                        <div class="mb-3 row">
                            Residual sugar
                            <input type="number" name="residual_sugar">
                        </div>
                        <div class="mb-3 row">
                            Total acidity
                            <input type="number" name="total_acidity">
                        </div>
                        <div class="mb-3 row">
                            Fats
                            <input type="number" name="fat_total">
                        </div>
                        <div class="mb-3 row">
                            Saturates
                            <input type="number" name="fat_saturates">
                        </div>
                        <div class="mb-3 row">
                            Carbohydrates
                            <input type="number" name="carbohydrate_total">
                        </div>
                        <div class="mb-3 row">
                            Sugars
                            <input type="number" name="carbohydrate_sugar">
                        </div>
                        <div class="mb-3 row">
                            Protein
                            <input type="number" name="protein">
                        </div>
                        <div class="mb-3 row">
                            Salt
                            <input type="number" name="salt">
                        </div>
                        <div class="mb-3 row">
                            Warnings:
                            <div class="mb-3 row">
                                Drinking during pregnancy
                                <input type="checkbox" name="warning_drinking_during_pregnancy">
                            </div>
                            <div class="mb-3 row">
                                Drinking below legal age
                                <input type="checkbox" name="warning_drinking_below_legal_age">
                            </div>
                            <div class="mb-3 row">
                                Drinking when driving
                                <input type="checkbox" name="warning_drinking_when_driving">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            Certifications:
                            <div class="mb-3 row">
                                Organic
                                <input type="checkbox" name="certifications_organic">
                            </div>
                            <div class="mb-3 row">
                                Vegetarian
                                <input type="checkbox" name="certifications_vegetarian">
                            </div>
                            <div class="mb-3 row">
                                Vegan
                                <input type="checkbox" name="certifications_vegan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            Country
                            <input type="text" name="country">
                        </div>
                        <div class="mb-3 row">
                            SKU
                            <input type="text" name="sku">
                        </div>
                        <div class="mb-3 row">
                            EAN
                            <input type="text" name="ean">
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
@endsection