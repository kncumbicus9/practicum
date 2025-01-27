@extends('layouts.master')

@section('content')
<h2>Registrar Cita</h2>
<form action="{{ route('citas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="paciente_id" class="form-label">Paciente</label>
        <select name="paciente_id" id="paciente_id" class="form-control" required>
            @foreach ($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <select name="especialidad" id="especialidad" class="form-control" required>
            @foreach ($especialidades as $especialidad)
                <option value="{{ $especialidad->especialidad }}">{{ $especialidad->especialidad }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
    <label for="medico_id" class="form-label">Médico</label>
        <select name="medico_id" id="medico_id" class="form-control" required>
            @foreach ($medicos as $medico)
                <option value="{{ $medico->id }}">{{ $medico->nombre }} {{ $medico->apellido }} - {{ $medico->especialidad }}</option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Registrar Cita</button>
</form>
@endsection

@push('scripts')
<script>
    document.getElementById('especialidad').addEventListener('change', function () {
    const especialidad = this.value
    const medicoSelect = document.getElementById('medico_id');

    medicoSelect.innerHTML = '';

    fetch(`/medicos/especialidad/${especialidad}`)
        .then(response => {
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
        })
        .then(data => {
            if (data.length === 0) {
                medicoSelect.innerHTML = '<option value="">No hay médicos disponibles</option>';
            } else {
                data.forEach(medico => {
                    const option = document.createElement('option');
                    option.value = medico.id;
                    option.textContent = `${medico.nombre} ${medico.apellido}`;
                    medicoSelect.appendChild(option);
                });
            }
        })
        .catch(error => console.error('Error al obtener médicos:', error));
});

</script>
@endpush

