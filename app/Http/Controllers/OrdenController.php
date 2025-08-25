<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Cliente;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = Orden::with(['cliente', 'equipo'])->get();
        return view('ordenes.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        return view('ordenes.create', compact('clientes', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'equipo_id' => 'required|exists:equipos,id',
            'descripcion' => 'required',
            'estado' => 'required'
        ]);

        Orden::create($request->all());
        return redirect()->route('ordenes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        $pdf = Pdf::loadView('ordenes.pdf', compact('orden'));
        return $pdf->stream("orden-{$orden->id}.pdf");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $ordene)
    {
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        return view('ordenes.edit', compact('ordene', 'clientes', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $ordene)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'equipo_id' => 'required|exists:equipos,id',
            'descripcion' => 'required',
            'estado' => 'required'
        ]);

        $ordene->update($request->all());
        return redirect()->route('ordenes.index');
    }

    public function destroy(Orden $orden)
    {
        $orden->delete();
        return redirect()->route('ordenes.index');
    }

    public function pdf(Orden $orden)
    {
        // Cargamos la relación cliente/equipos si hace falta
        $orden->load('cliente', 'equipo');

        $pdf = Pdf::loadView('ordenes.pdf', compact('orden'));
        return $pdf->download("orden_{$orden->id}.pdf");
    }
}
