@extends('layouts.master')
<!-- Header --->
@section('header-main')
Edit Department
@stop
@section('breadcrumb-list')
<li>Departments</li>
<li>Edit Department</li>
@stop

<!-- Header --->





@section('content')
{{Form::model($department, array('method' => 'PATCH', 'route' =>  array('departments.update', $department->department_id)))}}
<div class="col-md-4">
<div class="box box-primary">
<div class='box-body'>
<div class="form-group">
{{Form::label('','Department Name')}}
{{Form::text('department',null ,array('class' => 'form-control'))}}
</div>
</div>
</div>
{{Form::submit('Update Department',array('class' => 'btn  pull-right btn-warning'))}}
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
