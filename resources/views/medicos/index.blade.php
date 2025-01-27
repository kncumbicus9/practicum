@extends('layouts.master')

@section('title', 'Lista de Médicos')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Médicos</h1>
    <a href="{{ route('medicos.create') }}" class="btn btn-success mb-3">Registrar Médico</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
                <tr>
                    <td>{{ $medico->id }}</td>
                    <td>{{ $medico->nombre }}</td>
                    <td>{{ $medico->apellido }}</td>
                    <td>{{ $medico->especialidad }}</td>
                    <td>{{ $medico->correo }}</td>
                    <td>{{ $medico->telefono }}</td>
                    <td>
                        <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este médico?')">Eliminar</button>
                        </form>
                        <a href="{{ route('medicos.show', $medico->id) }}" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    
@endsection

