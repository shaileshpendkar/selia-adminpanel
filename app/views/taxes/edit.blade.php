@extends('layouts.master')
<!-- Header --->
@section('header-main')
Edit Tax
@stop
@section('breadcrumb-list')
<li>Taxes</li>
<li>Edit Tax</li>
@stop

<!-- Header --->




@section('content')
{{Form::model($tax, array('method' => 'PATCH', 'route' =>  array('taxes.update', $tax->tax_id)))}}
<div class="col-md-4">
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Tax Description')}}
{{Form::text('tax_description',null ,array('class' => 'form-control'))}}
</div>
<div class="form-group">
{{Form::label('','Tax %')}}
{{Form::text('tax_prc',null ,array('class' => 'form-control'))}}
</div>
</div>
</div>
{{Form::submit('Update Tax',array('class' => 'btn  pull-right btn-warning'))}}
</div>
</div>

</div>
{{ Form::close() }}


@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif


@stop
