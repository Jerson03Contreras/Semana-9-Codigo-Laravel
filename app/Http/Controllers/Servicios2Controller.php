<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Http\Requests\CreateServicioRequest;

class Servicios2Controller extends Controller
{
    public function __construct()
    {
        // Aplicar middleware 'auth' solo a los métodos 'edit' y 'destroy'
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $servicios = Servicio::oldest('id')->paginate(3);
        return view('servicios', compact('servicios'));
    }

    public function create()
    {
        return view('create', [
            'servicio' => new Servicio
        ]);
    }

    public function store(CreateServicioRequest $request)
    {
        Servicio::create($request->validated());
        return redirect()->route('servicios')->with('estado', 'El servicio fue creado correctamente');
    }

    public function show(Servicio $servicio)
    {
        return view('show', [
            'servicio' => $servicio
        ]);
    }

    public function edit(Servicio $servicio)
    {
        return view('editar', [
            'servicio' => $servicio
        ]);
    }

    public function update(Servicio $servicio, CreateServicioRequest $request)
    {
        $servicio->update($request->validated());

        return redirect()->route('servicios.show', $servicio)->with('estado', 'El servicio fue actualizado correctamente');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios')->with('estado', 'El servicio fue eliminado correctamente');
    }
}

