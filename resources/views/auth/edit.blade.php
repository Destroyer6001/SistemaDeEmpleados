@extends('layouts.app')
@section('title','edituser')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <p class="text-5xl mb-8 text-center font-bold">Editar Usuario</p>
    
    @if ( session('clavesdiferentes') )
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Lo sentimos</strong>
            <span class="block sm:inline">{{ session('clavesdiferentes') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    @if ( session('clavemenor') )
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Lo sentimos</strong>
            <span class="block sm:inline">{{ session('clavemenor') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    @if ( session('clavesiguales') )
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Lo sentimos</strong>
            <span class="block sm:inline">{{ session('clavesiguales') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif


    @if ( session('errorclave') )
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Lo sentimos</strong>
            <span class="block sm:inline"> {{ session('errorclave') }} </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif

    <form action="{{route('edit.update',['id' => $user->id])}}" class="mt-4" method="POST">
        
        @csrf
        @method('PATCH')

        <input type="text" name="username" placeholder="Nombre de usuario"
        id="username" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{$user->username}}">

        <input type="email" name="email" placeholder="Email"
        id="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white" value="{{$user->email}}">

        <input type="password" name="password" placeholder="Password"
        id="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="password" name="newpassword" placeholder="New Password"
        id="newpassword" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="password" name="confirmatenewpassword" placeholder="Confirmate Password"
        id="confirmatenewpassword" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
        p-3 my-3 hover:bg-indigo-600" value="Guardar Cambios">
        
    </form>
</div>

@endsection
