@extends('layouts.master')

@section('content')
<h2>Editar Médico</h2>
<form action="{{ route('medicos.update', $medico->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $medico->nombre }}" required>
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $medico->apellido }}" required>
    </div>

    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <input type="text" name="especialidad" id="especialidad" class="form-control" value="{{ $medico->especialidad }}" required>
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{ $medico->correo }}" required>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $medico->telefono }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
