<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Laravel App</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
 
  </head>
  <body class="bg-gray-100 text-gray-800">
  <nav class="flex py-5 bg-indigo-500 text-white">
    <div class="w-1/2 px-12 mr-auto">
      <p class="text-2x1 font-bold">My Application</p>
    </div>
    <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      @if(Auth::check())
      <li class="mx-2">
          <a href="{{route('empleados.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Empleados</a>
        </li>
        <li class="mx-2">
          <a href="{{route('puestos.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Puestos</a>
        </li>
        <li class="mx-2">
          <a href="{{url('/auth/'.auth()->user()->id.'/edit')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Edit</a>
        </li>
        <li class="mx-2">
          <a href="{{route('destroy.submit')}}" class="font-bold py-2 px-4 rounded-md bg-red hover:bg-red-600 hover:text-indigo-700">Log Out</a>
        </li>
        <li class="mx-2">
          <p class ="text-xl">Welcome <b>{{auth()->user()->username}}</b></p>
        </li>
       
      @else
        <li class="mx-6">
          <a href="{{route('login.index')}}" class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md">Log In</a>
        </li>
        <li>
          <a href="{{route('register.index')}}" class="border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700">Register</a>
        </li>
      @endif
    </ul>
  </nav>
    @yield('content')
    
  
  </body>
</html>