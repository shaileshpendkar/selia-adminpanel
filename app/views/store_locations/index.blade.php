@extends('layouts.master')
<!-- Header --->
@section('header-main')
Stores
@stop
@section('breadcrumb-list')
<li>Stores</li>
@stop

<!-- Header --->




@section('content')
<p>{{ link_to_route('store_locations.create', 'Add Store',null, array('class' => 'btn btn-danger')) }}</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Store Name</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>City</th>
                <th>State</th>
                <th>zip</th>
                <th>Tax</th>
                <th>Tax %</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
             @foreach ($store_locations as $store_location)
             <tr>
                    <td>{{ $store_location -> store_name }}</td>
                    <td>{{ $store_location -> add1 }}</td>
                    <td>{{ $store_location -> add2 }}</td>
                    <td>{{ $store_location -> city }}</td>
                    <td>{{ $store_location -> state }}</td>
                    <td>{{ $store_location -> zip }}</td>
                    <td>{{ $store_location -> tax_description }}</td>
                    <td>{{ $store_location -> tax_prc }} %</td>
 <td>{{ link_to_route('store_locations.edit', 'Edit', array($store_location->store_id), array('class' => 'btn btn-info')) }}</td>
 </tr>
 @endforeach
</tbody>
</table>

@stop