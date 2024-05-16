@extends('layout')
@section('title', 'Add a wine')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add a wine</div>
                <div class="card-body">
                    <form action="{{ route('wines.update', ['wine' => $wine->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$wine->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="volume" class="form-label">Volume</label>
                            <input type="number" class="form-control" id="volume" name="volume" value="{{$wine->volume}}">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{$wine->weight}}">
                        </div>
                        <div class="mb-3">
                            <label for="vintage" class="form-label">Vintage</label>
                            <input type="number" class="form-control" id="vintage" name="vintage" value="{{$wine->vintage}}">
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-select" id="type" name="type">
                                    @foreach (config('app.wine_types') as $type)
                                    <option value="{{$type}}" {{ $type == $wine->type ? 'selected' : '' }}>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="style" class="form-label">Style</label>
                                <select class="form-select" id="style" name="style">
                                    @foreach (config('app.wine_styles') as $style)
                                    <option value="{{$style}}" {{ $style == $wine->style ? 'selected' : '' }}>{{$style}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="sugar_content" class="form-label">Sugar content</label>
                                <select class="form-select" id="sugar_content" name="sugar_content">
                                    @foreach (config('app.wine_sugar_contents') as $sc)
                                    <option value="{{$sc}}" {{ $sc == $wine->sugar_content ? 'selected' : '' }}>{{$sc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 w-100">
                            <label for="packaging_gases" class="form-label">Packaging gases</label>
                            <select class="form-select" id="packaging_gases" name="packaging_gases">
                                @foreach (config('app.gases') as $pg)
                                <option value="{{$pg}}" {{ $pg == $wine->packaging_gases ? 'selected' : '' }}>{{$pg}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="appellation" class="form-label">Appellation</label>
                            <input type="text" class="form-control" id="appellation" name="appellation" value="{{$wine->appellation}}">
                        </div>
                        <div class="mb-3">
                            <label for="portion_volume" class="form-label">Portion volume</label>
                            <input type="number" class="form-control" id="portion_volume" name="portion_volume" value="{{$wine->portion_volume}}">
                        </div>
                        <div class="mb-3">
                            <label for="alcohol" class="form-label">Alcohol</label>
                            <input type="number" class="form-control" id="alcohol" name="alcohol" value="{{$wine->alcohol}}">
                        </div>
                        <div class="mb-3">
                            <label for="residual_sugar" class="form-label">Residual sugar</label>
                            <input type="number" class="form-control" id="residual_sugar" name="residual_sugar" value="{{$wine->residual_sugar}}">
                        </div>
                        <div class="mb-3">
                            <label for="total_acidity" class="form-label">Total acidity</label>
                            <input type="number" class="form-control" id="total_acidity" name="total_acidity" value="{{$wine->total_acidity}}">
                        </div>
                        <div class="mb-3">
                            <label for="fat_total" class="form-label">Fats</label>
                            <input type="number" class="form-control" id="fat_total" name="fat_total" value="{{$wine->fat_total}}">
                        </div>
                        <div class="mb-3">
                            <label for="fat_saturates" class="form-label">Saturates</label>
                            <input type="number" class="form-control" id="fat_saturates" name="fat_saturates" value="{{$wine->fat_saturates}}">
                        </div>
                        <div class="mb-3">
                            <label for="carbohydrate_total" class="form-label">Carbohydrates</label>
                            <input type="number" class="form-control" id="carbohydrate_total" name="carbohydrate_total" value="{{$wine->carbohydrate_total}}">
                        </div>
                        <div class="mb-3">
                            <label for="carbohydrate_sugar" class="form-label">Sugars</label>
                            <input type="number" class="form-control" id="carbohydrate_sugar" name="carbohydrate_sugar" value="{{$wine->carbohydrate_sugar}}">
                        </div>
                        <div class="mb-3">
                            <label for="protein" class="form-label">Protein</label>
                            <input type="number" class="form-control" id="protein" name="protein" value="{{$wine->protein}}">
                        </div>
                        <div class="mb-3">
                            <label for="salt" class="form-label">Salt</label>
                            <input type="number" class="form-control" id="salt" name="salt" value="{{$wine->salt}}">
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm">
                                <label class="form-label">Warnings:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="warning_drinking_during_pregnancy" name="warning_drinking_during_pregnancy" {{ $wine->warning_drinking_during_pregnancy ? 'checked' : '' }}>
                                    <label class="form-check-label" for="warning_drinking_during_pregnancy">
                                        Drinking during pregnancy
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="warning_drinking_below_legal_age" name="warning_drinking_below_legal_age" {{ $wine->warning_drinking_below_legal_age ? 'checked' : '' }}>
                                    <label class="form-check-label" for="warning_drinking_below_legal_age">
                                        Drinking below legal age
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="warning_drinking_when_driving" name="warning_drinking_when_driving" {{ $wine->warning_drinking_when_driving ? 'checked' : '' }}>
                                    <label class="form-check-label" for="warning_drinking_when_driving">
                                        Drinking when driving
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm" id="cert-column">
                                <label class="form-label">Certifications:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="certifications_organic" name="certifications_organic" {{ $wine->certifications_organic ? 'checked' : '' }}>
                                    <label class="form-check-label" for="certifications_organic">
                                        Organic
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="1" id="certifications_vegetarian" name="certifications_vegetarian" {{ $wine->certifications_vegetarian ? 'checked' : '' }}>
                                    <label class="form-check-label" for="certifications_vegetarian">
                                        Vegetarian
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="1" id="certifications_vegan" name="certifications_vegan" {{ $wine->certifications_vegan ? 'checked' : '' }}>
                                    <label class="form-check-label" for="certifications_vegan">
                                        Vegan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{$wine->country}}">
                        </div>
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{$wine->sku}}">
                        </div>
                        <div class="mb-3">
                            <label for="ean" class="form-label">EAN</label>
                            <input type="text" class="form-control" id="ean" name="ean" value="{{$wine->ean}}">
                        </div>                        
                        <div class="mb-3 d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection