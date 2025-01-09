@extends('layouts.master')

@section('title', 'Editar Paciente')

@section('content')
<div class="container mt-4">
    <h2>Editar Paciente</h2>
    <form action="{{ route('pacientes.update', $paciente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $paciente->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $paciente->apellido }}" required>
        </div>
        <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{ $paciente->fechaNacimiento }}" required>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-control" id="sexo" name="sexo" required>
                <option value="Masculino" {{ $paciente->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $paciente->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $paciente->email }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $paciente->telefono }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
