@extends('layout')

@section('content')

<br><br>
<h3>Candidato: {{ $candidate->user->full_name }}</h3>

<p>Categoria: <a href="{{ route('category', [Str::slug($candidate->category->name), $candidate->category_id, ]) }}">{{ $candidate->category->name }}</a></p>

<p>Tipo de Trabajo: {{ $candidate->job_type_title  }}</p>

<p>web site: <a href="{{ $candidate->website_url }}">{{ $candidate->website_url }}</a></p>

<h4>Descripción:</h4>

<p>{{ $candidate->description }}</p>

@stop