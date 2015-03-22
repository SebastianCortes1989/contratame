@extends('layout')

@section('content')

<h3>Categoria</h3>

<table>
    <tr>
        <th>
            Nombre: {{ $category->name }}
        </th>
    </tr>
    <tr>
        <th>
            URL : {{ $category->slug }}
        </th>
    </tr>
</table>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th></th>        
        </tr>
    </thead>
    <tbody>
        @foreach($category->paginate_candidates as $candidate)
            <tr>
                <th>{{ $candidate->user ? $candidate->user->full_name : '' }}</th>
                <th>{{ $candidate->job_type_title }}</th>
                <th>{{ $candidate->description }}</th>
                <th>
                    <a href="{{ route('candidate', [Str::slug($candidate->slug), $candidate->id]) }}">Ver</a>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $category->paginate_candidates->links() }}

@stop