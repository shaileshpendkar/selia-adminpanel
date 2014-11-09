@extends('layouts.master')
@section('content')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add to types to {{$dimension->dimension}}</h4>
      </div>
      <div class="modal-body">
{{ Form::open(array('route' => 'attributes.store')) }}
<div class="form-group">
{{Form::text('dimension',null ,array('class' => 'form-control'))}}
</div>
      </div>
      <div class="modal-footer">
      {{Form::submit('Save',array('class' => 'btn  pull-right btn-success'))}}
{{ Form::close() }}
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->

<div class="col-md-6">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Add
</button>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>{{$dimension->dimension}}</th>
                <th></th>
               </tr>
        </thead>

        <tbody>
             @foreach($attributes as $attribute)
             <tr>
                    <td>{{$attribute->attribute}}</td>

 <td>
  {{ link_to_route('attributes.edit', '', array($attribute->attribute_id), array('class' => 'btn btn-danger fa fa-edit')) }}

 </td>
 </tr>
 @endforeach
</tbody>
</table>
</div>



@stop