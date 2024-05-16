@extends('layout')
@section('title')
    @if ($wine)
        {{ $wine->name }}
    @else
        No Wine Found
    @endif
@endsection
@section('content')
    @if ($wine)
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title p-3"><h2>{{ $wine->name }}</h2></div>
                    <div class="card-body">
                    <p class="border-bottom border-top">Volume: {{ $wine->volume }}</p>
                    <p class="border-bottom border-top">Weight: {{ $wine->weight }}</p>
                    <p class="border-bottom border-top">Vintage: {{ $wine->vintage }}</p>
                    <p class="border-bottom border-top">Type: {{ $wine->type ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Style: {{ $wine->style ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Sugar Content: {{ $wine->sugar_content ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Packaging Gases: {{ $wine->packaging_gases ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Appellation: {{ $wine->appellation ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Portion Volume: {{ $wine->portion_volume ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Alcohol: {{ $wine->alcohol ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Residual Sugar: {{ $wine->residual_sugar ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Total Acidity: {{ $wine->total_acidity ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Kilocalorie: {{ $wine->kilocalorie ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Kilojoule: {{ $wine->kilojoule ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Fat Total: {{ $wine->fat_total ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Fat Saturates: {{ $wine->fat_saturates ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Carbohydrate Sugar: {{ $wine->carbohydrate_sugar ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Protein: {{ $wine->protein ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Salt: {{ $wine->salt ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Warning Drinking During Pregnancy: {{ $wine->warning_drinking_during_pregnancy ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Warning Drinking Below Legal Age: {{ $wine->warning_drinking_below_legal_age ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Warning Drinking When Driving: {{ $wine->warning_drinking_when_driving ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Certifications Organic: {{ $wine->certifications_organic ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Certifications Vegetarian: {{ $wine->certifications_vegetarian ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Certifications Vegan: {{ $wine->certifications_vegan ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Country: {{ $wine->country ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">SKU: {{ $wine->sku ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">EAN: {{ $wine->ean ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Created At: {{ $wine->created_at ?? 'Unknown' }}</p>
                    <p class="border-bottom border-top">Updated At: {{ $wine->updated_at ?? 'Unknown' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @else
        <p class="border-bottom border-top">No Wine Found</p>
    @endif

@endsection
