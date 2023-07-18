@extends('layouts.app')

@section('title','Login')

@section('content')
    <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">

        <h1 class="text-3xl text-center font-bold">Inicio De Sesion</h1>
        <form action="{{url('/login')}}" class="mt-4" method="POST">
            @csrf
            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email / Username" name="username" id="username">

            <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
            placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password" name="password" id="password">

            <input type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
            p-2 my-3 hover:bg-indigo-600" value="Inicio Sesion">
        </form>


    </div>
@endsection