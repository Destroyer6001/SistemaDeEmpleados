<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::all();
        return view('Puestos.index',compact('puestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Puestos.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre' => 'required|string|max:100|unique:puestos,Nombre'
        ];

        $mensajes=[
            'Nombre.required' => 'El campo nombre es requerido.',
            'Nombre.string' => 'El campo nombre debe ser un dato tipo texto',
            'Nombre.max' => 'El campo nombre debe tener un maximo de 100 caracteres',
            'Nombre.unique' => 'Ya se encuentra registrado el puesto en el sistema'
        ];

        $this->validate($request,$campos,$mensajes);

        $puesto = new Puesto();
        $puesto->Nombre = $request->input('Nombre');
        $puesto->save();
        return redirect('/puestos')->with('mensaje','El puesto ha sido creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = Puesto::findOrFail($id);
        return view('Puestos.Edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Nombre' => [
                'required',
                'string',
                Rule::unique('puestos')->ignore($id),
                'max:100'
            ]
        ];

        $mensajes = [
            'Nombre.required' => 'El campo nombre es requerido',
            'Nombre.string' => 'El campo nombre debe ser un dato tipo texto',
            'Nombre.unique' => 'El puesto ya se encuentra registrado en el sistema',
            'Nombre.max' => 'El campo nombre debe tener un maximo de 100 caracteres'
        ];

        $this->validate($request,$campos,$mensajes);
        $puesto = Puesto::findOrFail($id);
        $puesto->Nombre = $request->input('Nombre');
        $puesto->save();
        return redirect('/puestos')->with('mensaje','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puesto = Puesto::findOrFail($id);
        $puesto->delete();
        return redirect('/puestos')->with('mensaje','El puesto ha sido eliminado');
    }
}
