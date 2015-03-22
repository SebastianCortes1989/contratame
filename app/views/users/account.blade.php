@extends('layout')

@section('content')

<br><br><br>
{{ Form::model($user, ['route'=>'account', 'method'=>'PUT', 'role'=>'form']) }}

    {{ Field::text('full_name') }}
    {{ Field::email('email') }}
    {{ Field::password('password') }}
    {{ Field::password('password_confirmation') }}
    <hr>
    {{ Form::submit('Registrar', array('class'=>'btn btn-primary')) }}
{{ Form::close() }}


@endsection