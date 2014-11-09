@extends('layouts.master')
@section('content')

<script>
jQuery(document).ready(function($){
updateList();

	});

function updateList(){

    			    $.get("{{ url('dimensions')}}",
    				{ type: 'ajax' },
    				function(data) {
    					var model = $('#dimensionList');
    					model.empty();
    					$.each(data, function(index, element) {
    					 model.append("<li class='list-group-item'>" + element + "<button type='button' class='btn btn-sm' style='float: right'><i class='fa fa-edit'></i></button></li>");
    			        });
    				});

	}
</script>


@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

{{ Form::open(array('route' => 'dimensions.store')) }}
            {{ Form::text('dimension') }}
            {{ Form::submit('+', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

<ul class="list-group" id="dimensionList" style='width:400px'></ul>


@stop