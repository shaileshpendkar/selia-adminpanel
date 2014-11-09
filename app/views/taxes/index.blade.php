@extends('layouts.master')
<!-- Header --->
@section('header-main')
Taxes
@stop
@section('breadcrumb-list')
<li>Taxes</li>
@stop

<!-- Header --->




@section('content')
<p>{{ link_to_route('taxes.create', 'Add Tax',null, array('class' => 'btn btn-danger')) }}</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Tax Description</th>
                <th>Tax %</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
             @foreach ($taxes as $tax)
             <tr>
                    <td>{{ $tax -> tax_description }}</td>
                    <td>{{ $tax -> tax_prc }}%</td>

 <td>{{ link_to_route('taxes.edit', 'Edit', array($tax->tax_id), array('class' => 'btn btn-info')) }}</td>
 </tr>
 @endforeach
</tbody>
</table>

@stop