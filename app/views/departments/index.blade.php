@extends('layouts.master')
<!-- Header --->
@section('header-main')
Departments
@stop
@section('breadcrumb-list')
<li>Departments</li>
@stop

<!-- Header --->




@section('content')
<p>{{ link_to_route('departments.create', 'Add Department',null, array('class' => 'btn btn-danger')) }}</p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Department</th>
                <th></th>
               </tr>
        </thead>

        <tbody>
             @foreach ($departments as $department)
             <tr>
                    <td>{{ $department -> department }}</td>
 <td>{{ link_to_route('departments.edit', 'Edit', array($department->department_id), array('class' => 'btn btn-info')) }}</td>
 </tr>
 @endforeach
</tbody>
</table>

@stop