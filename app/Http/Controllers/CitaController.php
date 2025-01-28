<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with(['paciente', 'medico'])->get();
        if ($citas->isEmpty()) {
            return view('citas.index', ['citas' => $citas, 'message' => 'No hay citas registradas.']);
        }
        return view('citas.index', compact('citas'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $especialidades = Medico::select('especialidad')->distinct()->get();
        $medicos = Medico::all();
    
        return view('citas.create', compact('pacientes', 'especialidades', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            //'estado' => 'required|string',
        ]);

        //dd($request->all());

        //Cita::create($request->all());
        $cita = new Cita();
        $cita->paciente_id = $request->paciente_id;
        $cita->medico_id = $request->medico_id;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->estado = 'pendiente'; // o lo que corresponda
        $cita->save();


        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('citas.edit', compact('cita', 'pacientes', 'medicos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|string',
        ]);

        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');

    }
}
