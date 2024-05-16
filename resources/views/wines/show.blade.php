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
        <a href="/wines/{{$wine->id}}/generate/png" target='_blank'>Download QR code as PNG</a>
        <a href="/wines/{{$wine->id}}/generate/svg" target='_blank'>Download QR code as SVG</a>
        <a href="/wines/{{$wine->id}}/generate/pdf" target='_blank'>Download QR code as PDF</a>
        <h2>{{ $wine->name }}</h2>
        <p>Volume: {{ $wine->volume }}</p>
        <p>Weight: {{ $wine->weight }}</p>
        <p>Vintage: {{ $wine->vintage }}</p>
        <p>Type: {{ $wine->type ?? 'Unknown' }}</p>
        <p>Style: {{ $wine->style ?? 'Unknown' }}</p>
        <p>Sugar Content: {{ $wine->sugar_content ?? 'Unknown' }}</p>
        <p>Packaging Gases: {{ $wine->packaging_gases ?? 'Unknown' }}</p>
        <p>Appellation: {{ $wine->appellation ?? 'Unknown' }}</p>
        <p>Portion Volume: {{ $wine->portion_volume ?? 'Unknown' }}</p>
        <p>Alcohol: {{ $wine->alcohol ?? 'Unknown' }}</p>
        <p>Residual Sugar: {{ $wine->residual_sugar ?? 'Unknown' }}</p>
        <p>Total Acidity: {{ $wine->total_acidity ?? 'Unknown' }}</p>
        <p>Kilocalorie: {{ $wine->kilocalorie ?? 'Unknown' }}</p>
        <p>Kilojoule: {{ $wine->kilojoule ?? 'Unknown' }}</p>
        <p>Fat Total: {{ $wine->fat_total ?? 'Unknown' }}</p>
        <p>Fat Saturates: {{ $wine->fat_saturates ?? 'Unknown' }}</p>
        <p>Carbohydrate Sugar: {{ $wine->carbohydrate_sugar ?? 'Unknown' }}</p>
        <p>Protein: {{ $wine->protein ?? 'Unknown' }}</p>
        <p>Salt: {{ $wine->salt ?? 'Unknown' }}</p>
        <p>Warning Drinking During Pregnancy: {{ $wine->warning_drinking_during_pregnancy ?? 'Unknown' }}</p>
        <p>Warning Drinking Below Legal Age: {{ $wine->warning_drinking_below_legal_age ?? 'Unknown' }}</p>
        <p>Warning Drinking When Driving: {{ $wine->warning_drinking_when_driving ?? 'Unknown' }}</p>
        <p>Certifications Organic: {{ $wine->certifications_organic ?? 'Unknown' }}</p>
        <p>Certifications Vegetarian: {{ $wine->certifications_vegetarian ?? 'Unknown' }}</p>
        <p>Certifications Vegan: {{ $wine->certifications_vegan ?? 'Unknown' }}</p>
        <p>Country: {{ $wine->country ?? 'Unknown' }}</p>
        <p>SKU: {{ $wine->sku ?? 'Unknown' }}</p>
        <p>EAN: {{ $wine->ean ?? 'Unknown' }}</p>
        <p>Created At: {{ $wine->created_at ?? 'Unknown' }}</p>
        <p>Updated At: {{ $wine->updated_at ?? 'Unknown' }}</p>
    @else
        <p>No Wine Found</p>
    @endif

@endsection
