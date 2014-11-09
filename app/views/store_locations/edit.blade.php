@extends('layouts.master')
<!-- Header --->
@section('header-main')
Edit Store
@stop
@section('breadcrumb-list')
<li>Stores</li>
<li>Edit Store</li>>
@stop

<!-- Header --->




@section('content')

<script>

jQuery(document).ready(function($){

	getTaxSelectoptions();

});
function getStoreTaxids(){
$.get("{{ url('taxes/store_tax/')}}/{{$store->store_id}}",
				function(data) {

					$('#tax_id').val(data[0].tax_id).change();
					/*
					Below code is for future use when multiple taxes are added to a store
					$.each(data, function(index) {
                    console.dir(data[index].tax_id);
			        });
			        */
			                   });

}
function getTaxSelectoptions(){
$.get("{{ url('taxes')}}/{{$store->store_id}}",
				function(data) {
					var model = $('#tax_id');
					model.empty();
					model.append("<option value=''>Not Selected</option>");
					$.each(data, function(index, element) {
			            model.append("<option value='"+ index +"'>" + element + "</option>");
			        });
			        getStoreTaxids();
                            });

}




</script>
{{Form::model($store, array('method' => 'PATCH', 'route' =>  array('store_locations.update', $store->store_id)))}}
<div class="col-md-4">
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Store Name')}}
{{Form::text('store_name',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','Address 1')}}
{{Form::text('add1',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','Address 2')}}
{{Form::text('add2',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','city')}}
{{Form::text('city',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','state')}}
{{Form::text('state',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','PIN/ZIP code')}}
{{Form::text('zip',null ,array('class' => 'form-control'))}}
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Store Tax')}}
{{ Form::select('tax_id', [] , null,['class' => 'form-control','id'=>'tax_id' ]) }}


</div>
</div></div>
<div>
{{Form::submit('Update Store',array('class' => 'btn  pull-right btn-warning'))}}
</div>
</div>



{{ Form::close() }}


@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif


@stop
