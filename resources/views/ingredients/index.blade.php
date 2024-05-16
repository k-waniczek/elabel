@extends('layout')
@section('title', 'Ingredients List')
@section('content')
<?php
use App\Models\IngredientCategory;
?>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<div class="container col-10 mt-5">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Allergens</th>
                <th class="col-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredients as $ingredient)
                <tr id="tr_{{$ingredient->id}}">
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->category = IngredientCategory::where('id', $ingredient->category)->get()[0]->name }}
                    </td>
                    <td>{{ $ingredient->allergen ? "Yes" : "No" }}</td>
                    <td>
                        @if ($ingredient->custom)
                            <a class="delete btn btn-danger" href="javascript:void(0)"
                                onclick="deleterow({{$ingredient->id}})">Delete</a>
                            <a class="btn btn-primary" href="/ingredients/{{$ingredient->id}}/edit" target="_blank">Edit</a>
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