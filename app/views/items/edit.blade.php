@extends('layouts.master')
<!-- Header --->
@section('header-main')
Edit Item
@stop
@section('breadcrumb-list')
<li>Items List</li>
<li>Edit Item</li>
@stop

<!-- Header --->






@section('content')
 <!-- multi select box css and js -->
{{ HTML::style('multi-select/css/bootstrap-select.min.css') }}
{{ HTML::script('multi-select/js/bootstrap-select.min.js') }}
{{ HTML::script('js/jquery.number.min.js') }}
{{ Form::open(array('route' => 'items.store')) }}
{{Form::model($catalog, array('method' => 'PATCH', 'route' =>  array('items.update', '')))}}

<script>
jQuery(document).ready(function($){
$('#unit_cost').number( true, 2 );
$('#margin').number( true, 0 );
$('#sell_price').number( true, 2 );
$('[name="unit_cost"]').bind('input', function (e) {
    calculateRetailPrice($('[name="unit_cost"]'), $('[name="margin"]'), $('[name="sell_price"]'));

});
$('[name="margin"]').bind('input', function (e) {
    calculateRetailPrice($('[name="unit_cost"]'), $('[name="margin"]'), $('[name="sell_price"]'));

});

function calculateRetailPrice(supplyprice, margin, sellprice) {
    if (supplyprice.val() && margin.val()) {
        // caluclate margin percentage
        marginprc = Number(supplyprice.val()) * Number(margin.val()) / 100;
        sellprice.val(Number(supplyprice.val()) + marginprc);
    }
}

getDepartments();

});
function getDepartments(){
$.get("{{ url('department_list')}}",
				function(data) {
					var model = $("select[name=department]");
					model.empty();
					model.append("<option value=''>Not Selected</option>");
					$.each(data, function(index, element) {
			            model.append("<option value='"+ element.department_id +"'>" + element.department + "</option>");
			            });
			            });
			            }

function calculateRetailPrice(supplyprice,margin,sellprice){
if(supplyprice.val() && margin.val()){

sellprice.val() = supplyprice.val() + margin.val();
}
}


</script>



<!-- Left column start-->
<div class="col-md-4">
<!-- Item box start-->
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Item Name')}}
{{Form::text('item',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','Department')}}
{{Form::select('department',array('1' => 'Department 1', '2' => 'Department 2'),null,array('class' => 'form-control'))}}
</div>
</div>
</div>
<!-- Item Box end-->

<!-- Price Box start-->
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Supply Price')}}
{{Form::text('unit_cost',null ,array('class' => 'form-control','id'=>'unit_cost'))}}
</div>
<div class="form-group">
{{Form::label('','Margin %')}}
{{Form::text('margin',null ,array('class' => 'form-control','id'=>'margin'))}}
</div>
<div class="form-group">
{{Form::label('','Retail Price')}}
{{Form::text('sell_price',null ,array('class' => 'form-control','id'=>'sell_price'))}}
</div>
</div>

<!-- Price box end-->
</div>
{{Form::submit('Create Item',array('class' => 'btn  pull-right btn-success'))}}
</div>
<!-- Left column end-->

<div class="col-md-4"><!-- Right column start-->
<div class="box box-primary"><!-- Item Pic start -->
<div class='box-body'>

<img src="http://placehold.it/120x120" alt="..." class="margin">
<button class="btn btn-Info">Upload Image</button>
</div>
</div><!-- Item Pic end -->

<div class="box box-primary"><!-- Variant Item start-->
<div class='box-body'>

</div>
</div><!-- Variant Item box end-->
<div class="box box-primary"><!-- Tax start-->
<div class='box-body'>
<div class="form-group">
{{Form::label('','Taxable')}}
{{Form::select('taxable',array('0' => 'NO', '1' => 'Yes'),null,array('class' => 'form-control'))}}
</div>
</div><!-- Tax box end-->
</div>
</div><!-- Right column end-->
{{ Form::close() }}
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
@stop
