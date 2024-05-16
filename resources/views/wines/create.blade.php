@extends('layout')
@section('title', 'Add a wine')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add a wine</div>
                <div class="card-body">
                    <form action="{{ route('wines.store') }}" method="post">
                        @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="The name of your wine, e.g. Bordeaux">
                    </div>
                    <div class="mb-3">
                        <label for="volume" class="form-label">Volume</label>
                        <input type="number" class="form-control" id="volume" name="volume" placeholder="The total volume of your wine in ml, e.g. 750">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Weight of the bottle in grams, e.g. 1300">
                    </div>
                    <div class="mb-3">
                        <label for="vintage" class="form-label">Vintage</label>
                        <input type="number" class="form-control" id="vintage" name="vintage" placeholder="Year the grapes were harvested, e.g. 2023">
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type">
                                @foreach (config('app.wine_types') as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="style" class="form-label">Style</label>
                            <select class="form-select" id="style" name="style">
                                @foreach (config('app.wine_styles') as $style)
                                    <option value="{{$style}}">{{$style}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="sugar_content" class="form-label">Sugar content</label>
                            <select class="form-select" id="sugar_content" name="sugar_content">
                                @foreach (config('app.wine_sugar_contents') as $sc)
                                    <option value="{{$sc}}">{{$sc}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="mb-3 w-100">
                            <label for="packaging_gases" class="form-label">Packaging gases</label>
                            <select class="form-select" id="packaging_gases" name="packaging_gases">
                                @foreach (config('app.gases') as $pg)
                                    <option value="{{$pg}}">{{$pg}}</option>
                                @endforeach
                            </select>
                        </div><div class="mb-3">
                          <label for="appellation" class="form-label">Appellation</label>
                          <input type="text" class="form-control" id="appellation" name="appellation" placeholder="The designated region of grape origin, e.g. Napa Valley">
                        </div>
                        <div class="mb-3">
                          <label for="portion_volume" class="form-label">Portion Volume</label>
                          <input type="number" class="form-control" id="portion_volume" name="portion_volume" placeholder="Typical serving size in milliliters, e.g. 150ml">
                        </div>
                        <div class="mb-3">
                          <label for="alcohol" class="form-label">Alcohol (% ABV)</label>
                          <input type="number" class="form-control" id="alcohol" name="alcohol" placeholder="Alcohol by volume, e.g. 13.5">
                        </div>
                        <div class="mb-3">
                          <label for="residual_sugar" class="form-label">Residual Sugar (g/L)</label>
                          <input type="number" class="form-control" id="residual_sugar" name="residual_sugar" placeholder="Grams of sugar per liter remaining after fermentation">
                        </div>
                        <div class="mb-3">
                          <label for="total_acidity" class="form-label">Total Acidity (g/L)</label>
                          <input type="number" class="form-control" id="total_acidity" name="total_acidity" placeholder="Total amount of acidity in the wine">
                        </div>

                        <div class="mb-3">
                          <label for="fat_total" class="form-label">Total Fat (g/L)</label>
                          <input type="number" class="form-control" id="fat_total" name="fat_total" placeholder="Total fat content, usually very low">
                        </div>
                        <div class="mb-3">
                          <label for="fat_saturates" class="form-label">Saturated Fat (g/L)</label>
                          <input type="number" class="form-control" id="fat_saturates" name="fat_saturates" placeholder="Saturated fat content, usually negligible">
                        </div>

                        <div class="mb-3">
                          <label for="carbohydrate_total" class="form-label">Total Carbohydrates (g/L)</label>
                          <input type="number" class="form-control" id="carbohydrate_total" name="carbohydrate_total" placeholder="Total amount of carbohydrates, primarily from residual sugar">
                        </div>
                        <div class="mb-3">
                          <label for="carbohydrate_sugar" class="form-label">Sugars (g/L)</label>
                          <input type="number" class="form-control" id="carbohydrate_sugar" name="carbohydrate_sugar" placeholder="Amount of sugar remaining after fermentation">
                        </div>

                        <div class="mb-3">
                            <label for="protein" class="form-label">Protein (g/L)</label>
                            <input type="number" class="form-control" id="protein" name="protein" placeholder="Amount of protein, usually very low">
                        </div>
                        <div class="mb-3">
                          <label for="salt" class="form-label">Salt (g/L)</label>
                          <input type="number" class="form-control" id="salt" name="salt" placeholder="Amount of sodium chloride, usually negligible">
                        </div>

                        <div class="row mb-3">

                            <div class="col-sm">
                                <label class="form-label">Warnings:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="warning_drinking_during_pregnancy" name="warning_drinking_during_pregnancy">
                                    <label class="form-check-label" for="warning_drinking_during_pregnancy">
                                        Drinking during pregnancy
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="warning_drinking_below_legal_age" name="warning_drinking_below_legal_age">
                                    <label class="form-check-label" for="warning_drinking_below_legal_age">
                                        Drinking below legal age
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="warning_drinking_when_driving" name="warning_drinking_when_driving">
                                    <label class="form-check-label" for="warning_drinking_when_driving">
                                        Drinking when driving
                                    </label>
                                </div>
                        </div>

                            <div class="col-sm" id="cert-column">
                                <label class="form-label">Certifications:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="certifications_organic"
                                        name="certifications_organic">
                                    <label class="form-check-label" for="certifications_organic">
                                        Organic
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="1" id="certifications_vegetarian"
                                        name="certifications_vegetarian">
                                    <label class="form-check-label" for="certifications_vegetarian">
                                        Vegetarian
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="1" id="certifications_vegan"
                                        name="certifications_vegan">
                                    <label class="form-check-label" for="certifications_vegan">
                                        Vegan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                          <label for="country" class="form-label">Country</label>
                          <input type="text" class="form-control" id="country" name="country" placeholder="The country of origin for the wine">
                        </div>
                        <div class="mb-3">
                          <label for="sku" class="form-label">SKU</label>
                          <input type="text" class="form-control" id="sku" name="sku" placeholder="Stock Keeping Unit, a product identifier">
                        </div>
                        <div class="mb-3">
                          <label for="ean" class="form-label">EAN</label>
                          <input type="text" class="form-control" id="ean" name="ean" placeholder="European Article Number, a product barcode">
                        </div>

                        <div class="mb-3 mt-4 row gap-2">
                            <button class="btn btn-outline-secondary col" type="reset">Cancel</button>
                            <button class="btn btn-primary col" type="submit">Add wine</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection