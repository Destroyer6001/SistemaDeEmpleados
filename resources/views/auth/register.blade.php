@extends('layouts.app')

@section('title','Register')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">
    <p class="text-5xl text-center font-bold">Registro De Usuario</p>
    <form action="{{url('/register')}}" class="mt-4" method="POST">
        @csrf

        <input type="text" name="username" placeholder="Nombre de usuario"
        id="username" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="email" name="email" placeholder="Email"
        id="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="password" name="password" placeholder="Password"
        id="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="password" name="confirm-password" placeholder="Confirm Password"
        id="Confirm-password" class="border border-gray-200 rounded-md bg-gray-200 w-full
        placeholder-gray-900 p-2 my-2 focus:bg-white">

        <input type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
        p-3 my-3 hover:bg-indigo-600" value="Guardar">
        
    </form>
</div>

   

    
@endsection