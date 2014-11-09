@extends('layouts.master')
<!-- Header --->
@section('header-main')
Add Department
@stop
@section('breadcrumb-list')
<li>Departments</li>
<li>Add Department</li>
@stop

<!-- Header --->




@section('content')
{{ Form::open(array('route' => 'departments.store')) }}
<div class="col-md-4">
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Department Name')}}
{{Form::text('department',null ,array('class' => 'form-control'))}}
</div>
</div>
</div>
{{Form::submit('Create Department',array('class' => 'btn  pull-right btn-success'))}}
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
