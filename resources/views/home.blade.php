@extends('layouts.master')

@section('title', 'Inicio - Hospital Isidro Ayora')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">Bienvenido al Hospital Isidro Ayora</h1>
        <p class="lead">Ofrecemos servicios médicos de calidad con tecnología avanzada.</p>
        <hr class="my-4">
        <!--<div class="d-flex justify-content-center">
            <a class="btn btn-primary btn-lg mx-2" href="{{ route('pacientes.index') }}">Gestión de Pacientes</a>
            <a class="btn btn-secondary btn-lg mx-2" href="{{ route('medicos.index') }}">Gestión de Médicos</a>
            <a class="btn btn-success btn-lg mx-2" href="{{ route('citas.index') }}">Gestión de Citas</a>
        </div>-->
    </div>
@endsection