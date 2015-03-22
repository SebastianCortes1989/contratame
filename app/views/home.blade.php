@extends('layout')

@section('content')

<br><br><br>
<table class="table">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Candidato</th>
            <th>Tipo de Trabajo</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($last_categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @foreach($category->candidates as $candidate)
                <tr>
                    <td></td>
                    <td>{{ $candidate->user->full_name }}</td>
                    <td>{{ $candidate->job_type_title }}</td>
                    <td>{{ $candidate->description }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>


@stop