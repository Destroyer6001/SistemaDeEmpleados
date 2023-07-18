<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Puesto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::with('RelacionPuestos')->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos = Puesto::all();
        return view('empleados.create',compact('puestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Email' => 'required|email|max:150|unique:empleados,Email',
            'Fotografia' => 'required|mimes:jpg,png,jpeg|max:10000'
        ];

        $mensajes = [
            'Nombre.required' => 'El campo nombre es requerido',
            'Nombre.string' => 'El campo nombre debe ser tipo texto',
            'Nombre.max' => 'El campo nombre debe tener un maximo de 100 caracteres',
            'Email.required' => 'El campo email es requerido',
            'Email.email' => 'El campo email debe ser tipo correo',
            'Email.max' => 'El campo email debe tener un maximo de 150 caracteres',
            'Email.unique' => 'Ya se encuentra un empleado registrado con ese correo',
            'Fotografia.required' => 'El campo fotografia es requerido',
            'Fotografia.mimes' => 'El campo fotografia debe estar en formato de imagen',
            'Fotografia.max' => 'El campo fotografia debe tener un maximo de 10000 caracteres'
        ];

        $this->validate($request,$campos,$mensajes);

        $datosdelempleado = request()->except('_token');

        if($request->hasFile('Fotografia'))
        {
            $datosdelempleado['Fotografia'] = $request->File('Fotografia')->store('uploads','public');
        }

        $empleado = New Empleado();
        $empleado->Nombre = $datosdelempleado['Nombre'];
        $empleado->PrimerApellido = $datosdelempleado['PrimerApellido'];
        $empleado->SegundoApellido = $datosdelempleado['SegundoApellido'];
        $empleado->Email = $datosdelempleado['Email'];
        $empleado->PuestoId = $datosdelempleado['puestoid'];
        $empleado->Fotografia = $datosdelempleado['Fotografia'];
        $empleado->save();
        return redirect('/empleados')->with('mensaje','Empleado registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $puestos = Puesto::all();
        return view('empleados.edit',compact('empleado','puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Email' => [
                'required',
                'email',
                'max:150',
                Rule::unique('empleados')->ignore($id)
            ]
        ];

        $mensajes = [
            'Nombre.required' => 'El campo nombre es un campo requerido',
            'Nombre.string'  => 'El campo nombre debe ser un campo tipo texto',
            'Nombre.max' => 'El campo nombre debe tener como maximo 100 caracteres',
            'Email.required' => 'El campo email es un campo requerido',
            'Email.email' => 'El campo email debe ser tipo email',
            'Email.max' => 'El campo email debe tener como maximo 150 caracteres',
            'Email.unique' => 'Ya se encuentra un empleado registrado con ese correo'
        ];

        $this->validate($request,$campos,$mensajes);
        $datosdelempleado = request()->except('_token');
        if($request->hasfile('Fotografia'))
        {
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Fotografia);
            $datosdelempleado['Fotografia'] = $request->file('Fotografia')->store('uploads','public');
            $empleado->Fotografia = $datosdelempleado['Fotografia'];
            $empleado->save();
        }

        $empleado = Empleado::findOrFail($id);
        $empleado->Nombre = $datosdelempleado['Nombre'];
        $empleado->PrimerApellido = $datosdelempleado['PrimerApellido'];
        $empleado->SegundoApellido = $datosdelempleado['SegundoApellido'];
        $empleado->Email = $datosdelempleado['Email'];
        $empleado->PuestoId = $datosdelempleado['puestoid'];
        $empleado->save();

        return redirect('/empleados')->with('mensaje','El empleado ha sido correctamente actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Fotografia))
        {
            $empleado->delete();
        }

        return redirect('/empleados')->with('mensaje','Empleado eliminado correctamente del sistema');
    }
}
