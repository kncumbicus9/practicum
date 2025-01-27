@extends('layouts.master')

@section('title', 'Lista de Citas')

@section('content')
    <h1 class="mb-4">Lista de Citas</h1>
    <a href="{{ route('citas.create') }}" class="btn btn-success mb-3">Registrar Cita</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($citas->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">No hay citas registradas.</td>
                </tr>
            @else
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->paciente->nombre ?? 'Paciente no encontrado' }} {{ $cita->paciente->apellido ?? '' }}</td>
                        <td>{{ $cita->medico->nombre ?? 'Médico no encontrado' }} {{ $cita->medico->apellido ?? '' }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->estado ?? 'Pendiente' }}</td>
                        <td>
                            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta cita?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif    
        </tbody>



    </table>
@endsection

