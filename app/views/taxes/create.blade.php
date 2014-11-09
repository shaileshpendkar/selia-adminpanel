@extends('layouts.master')
<!-- Header --->
@section('header-main')
Add Tax
@stop
@section('breadcrumb-list')
<li>Taxes</li>
<li>Add Tax</li>
@stop

<!-- Header --->

@section('content')
 <!-- ladda-bootstrap spinner (to avoid multi submit of form) css and js -->
{{ HTML::style('ladda-spinner/dist/ladda-themeless.min.css') }}
{{ HTML::script('ladda-spinner/dist/spin.min.js') }}
{{ HTML::script('ladda-spinner/dist/ladda.min.js') }}


{{ Form::open(array('route' => 'taxes.store')) }}
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
{{Form::submit('Create Tax',array('class' => 'btn  pull-right ladda-button','data-style'=>'zoom-in'))}}
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
