<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'correo' => 'required|email|unique:medicos,correo', // Cambiado a 'correo'
            'telefono' => 'nullable|string|max:20',
        ]);
    
        Medico::create($request->all());
    
        return redirect()->route('medicos.index')->with('success', 'Médico registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'correo' => 'required|email|unique:medicos,correo,' . $medico->id,
            'telefono' => 'nullable|string|max:20',
        ]);
    
        $medico->update($request->all());
    
        return redirect()->route('medicos.index')->with('success', 'Médico actualizado exitosamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

    return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente.');

    }

    public function getMedicosPorEspecialidad($especialidad)
    {
        $medicos = Medico::where('especialidad', $especialidad)->get();
        return response()->json($medicos);
    }
}
