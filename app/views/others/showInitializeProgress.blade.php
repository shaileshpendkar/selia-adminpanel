@extends('...layouts.master')
@section('content')
<div class="alert alert-info" >
    <i class="fa fa-info"></i>
    <b>Note:</b> Creating Database for {{Confide::user()->store_name}} Store. Please Wait ....
</div>

<div class="progress  progress-striped active">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
        <span class="sr-only">80% Complete</span>
    </div>
</div>
@stop
