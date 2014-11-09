@extends('layouts.master')
<!-- Header --->
@section('header-main')
{{ $item -> item }} <small>Variants</small>
@stop
@section('breadcrumb-list')
<li>Items List</li>
<li>Variants</li>
@stop

<!-- Header --->






@section('content')

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>{{ $item -> dim1 }}</th>
                 @if(isset($item -> dim2))
                 <th>{{ $item -> dim2 }}</th>
                 @endif
                <th class="text-right">Supply Price</th>
                <th class="text-right">Margin %</th>
                <th class="text-right">Retail Price</th>
                <th class="text-center">Tax able</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
             @foreach ($catalogs as $catalog)
             <tr>
                    <td>{{ $catalog -> a1 }}</td>
                    @if(isset($item -> dim2))
                    <td>{{ $catalog -> a2 }}</td>
                    @endif
                    <td class="text-right">{{ $catalog -> unit_cost }}</td>
                    <td class="text-right">{{ $catalog -> margin }}</td>
                    <td class="text-right">{{ $catalog -> sell_price }}</td>
                    <td class="text-center"> @if ($catalog -> taxable = 1) Yes @else NO @endif</td>

  <td>{{  link_to_route('items.edit', '', array($catalog->catalog_id), array('class' => 'btn btn-danger fa fa-edit')) }}</td>
 </tr>
 @endforeach
</tbody>
</table>
<div class="pull-right">{{$catalogs->links();}}</div>
@stop