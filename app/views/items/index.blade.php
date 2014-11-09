@extends('layouts.master')
<!-- Header --->
@section('header-main')
Items List
@stop
@section('breadcrumb-list')
<li>Items List</li>
@stop

<!-- Header --->





@section('content')

<p>{{ link_to_route('items.create', 'Add Item',null, array('class' => 'btn btn-danger')) }}</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Department</th>
                <th class="text-right">Supply Price</th>
                <th class="text-right">Margin %</th>
                <th class="text-right">Retail Price</th>
                <th class="text-center">Tax able</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
             @foreach ($items as $item)
             <tr>
                    <td>{{ $item -> item }}</td>
                    <td>{{ $item -> department }}</td>
                    <td class="text-right">{{ $item -> unit_cost }}</td>
                    <td class="text-right">{{ $item -> margin }}</td>
                    <td class="text-right">{{ $item -> sell_price }}</td>
                    <td class="text-center"> @if ($item -> taxable = 1) Yes @else NO @endif</td>

 @if(isset($item -> dim_id_1))
  <td>{{  link_to_route('var_items', '', array($item->item_id), array('class' => 'btn btn-info fa fa-arrow-circle-right')) }}</td>
 @else
  <td>{{  link_to_route('items.edit', '', array($item->catalog_id), array('class' => 'btn btn-danger fa fa-edit')) }}</td>
 @endif
 </tr>
 @endforeach
</tbody>
</table>
<div class="pull-right">{{$items->links();}}</div>
@stop