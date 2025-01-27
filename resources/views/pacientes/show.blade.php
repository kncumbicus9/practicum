@extends('layouts.master')

@section('title', 'Detalle del Paciente')

@section('content')
    <h1>Detalle del Paciente</h1>
    <ul>
        <li><strong>Nombre:</strong> {{ $paciente->nombre }}</li>
        <li><strong>Apellido:</strong> {{ $paciente->apellido }}</li>
        <li><strong>Correo:</strong> {{ $paciente->correo }}</li>
        <li><strong>Teléfono:</strong> {{ $paciente->telefono }}</li>
        <li><strong>Fecha de Nacimiento:</strong> {{ $paciente->fechaNacimiento }}</li>
        <li><strong>Sexo:</strong> {{ $paciente->sexo }}</li>
    </ul>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Volver</a>
@endsection
