@extends('layouts.master')

@section('title', 'Lista de Pacientes')

@section('content')
<div class="container mt-4">
    <h2>Lista de Pacientes</h2>
    <a href="{{ route('pacientes.create') }}" class="btn btn-success mb-3">Registrar Paciente</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->apellido }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

