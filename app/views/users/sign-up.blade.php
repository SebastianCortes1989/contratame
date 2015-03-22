@extends('layout')

@section('content')

<br><br><br>
{{ Form::open(['route'=>'register', 'method'=>'POST', 'role'=>'form']) }}

    {{ Field::text('full_name') }}
    {{ Field::email('email') }}
    {{ $fieldBuilder->input('password', 'password') }}
    {{ Field::password('password_confirmation') }}
    <hr>
    {{ Form::submit('Registrar', array('class'=>'btn btn-primary')) }}
{{ Form::close() }}


@endsection