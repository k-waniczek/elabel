@extends('layout')
@section('title', 'Wines List')
@section('content')
<?php
use App\Models\IngredientCategory;
?>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<div class="containerBox col-10 mt-5">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Volume</th>
                <th>Vintage</th>
                <th>Type</th>
                <th>Style</th>
                <th>Sugar content</th>
                <th>Packaging gases</th>
                <th>Appelation</th>
                <th>Alcohol</th>
                <th>Total acidity</th>
                <th>Country</th>
                <th>SKU</th>
                <th>EAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wines as $wine)
                <tr id="tr_{{$wine->id}}">
                    <td>{{ $wine->name }}</td>
                    <td>{{ $wine->volume }}</td>
                    <td>{{ $wine->vintage }}</td>
                    <td>{{ $wine->type }}</td>
                    <td>{{ $wine->style }}</td>
                    <td>{{ $wine->sugar_content }}</td>
                    <td>{{ $wine->packaging_gases }}</td>
                    <td>{{ $wine->appelation }}</td>
                    <td>{{ $wine->alcohol }}</td>
                    <td>{{ $wine->total_acidity }}</td>
                    <td>{{ $wine->country }}</td>
                    <td>{{ $wine->sku }}</td>
                    <td>{{ $wine->ean }}</td>
                    <td>
                        @if ($wine->custom)
                            <a class="delete btn btn-danger" href="javascript:void(0)"
                                onclick="deleterow({{$wine->id}})">Delete</a>
                            <a class="btn btn-primary" href="/wines/{{$wine->id}}/edit" target="_blank">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myTable").DataTable();
    })

    function deleterow(id) {
        if (confirm("Are you sure to delete this?")) {

            $.ajaxSetup({

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            })
            window.location.reload();

            $.ajax({

                url: id,
                type: 'DELETE',

                success: function (result) {
                    $("#" + result['tr']).slideUp("slow");
                }
            })
        }
    }
</script>

@endsection