@extends('layouts.app')

@section('title','Empleados')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-9/12 border border-gray-200 rounded-lg shadow-lg">

<h1 class="text-3xl mb-12 font-bold">Empleados</h1>
<a href="{{route('empleados.create')}}" class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear</a>
@if(session('mensaje'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-8 py-8 mt-10 mb-10" role="alert">
        <p class="font-bold">Felicidades</p>
        <p class="text-sm">{{session('mensaje')}}</p>
    </div>
@endif
<div class="relative mt-10 overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Primer Apellido
                </th>
                <th scope="col" class="px-6 py-3">
                    Segundo Apellido
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Puesto
                </th>
                <th scope="col" class="px-6 py-3">
                    Fotografia
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$empleado->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$empleado->Nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$empleado->PrimerApellido}}
                    </td>
                    <td class="px-6 py-4">
                        {{$empleado->SegundoApellido}}
                    </td>
                    <td class="px-6 py-4">
                        {{$empleado->Email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$empleado->RelacionPuestos->Nombre}}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{asset('storage').'/'.$empleado->Fotografia}}"class="img-thiumbnail img-fluid"width="50" alt="fotografia del empleado">
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('empleados.edit',$empleado->id)}}" class="btn focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Editar</a>
                        |
                        <form action="{{route('empleados.destroy',$empleado->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" Value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>


@endsection