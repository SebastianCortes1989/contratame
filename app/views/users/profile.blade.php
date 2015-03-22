@extends('layout')

@section('content')

<br><br><br>
{{ Form::model($candidate, ['route'=>'update-profile', 'method'=>'PUT', 'role'=>'form']) }}

    {{ Field::url('website_url') }}
    {{ Field::select('job_type', '', '', $job_types) }}
    {{ Field::select('category_id', '', '',$categories) }}
    {{ Field::textarea('description') }}
    {{ Field::checkbox('avalaible') }}
    <hr>
    {{ Form::submit('Actualizar', array('class'=>'btn btn-primary')) }}
{{ Form::close() }}


@endsection