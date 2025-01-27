@extends('layouts.master')

@section('title', 'Detalle del Médico')

@section('content')
    <h1>Detalle del Médico</h1>
    <ul>
        <li><strong>Nombre:</strong> {{ $medico->nombre }}</li>
        <li><strong>Apellido:</strong> {{ $medico->apellido }}</li>
        <li><strong>Especialidad:</strong> {{ $medico->especialidad }}</li>
        <li><strong>Correo:</strong> {{ $medico->correo }}</li>
        <li><strong>Teléfono:</strong> {{ $medico->telefono }}</li>
    </ul>
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
