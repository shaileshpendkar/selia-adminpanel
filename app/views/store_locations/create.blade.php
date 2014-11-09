@extends('layouts.master')
<!-- Header --->
@section('header-main')
Add Store
@stop
@section('breadcrumb-list')
<li>Stores</li>
<li>Add Store</li>
@stop

<!-- Header --->




@section('content')
{{ Form::open(array('route' => 'store_locations.store')) }}
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
{{ Form::select('tax_id', $tax_options , null,['class' => 'form-control' ]) }}
</div>
</div></div>
<div>
{{Form::submit('Create Store',array('class' => 'btn  pull-right btn-success'))}}
</div>
</div>



{{ Form::close() }}


@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif


@stop
