@extends('layout.general')

@section('content')
    
    <div class="form-container absolute-container gray-background">

        <h2>Iniciar Sesión</h2>

        @if(count($errors) > 0)

            <p>{{$errors->first()}}</p>

        @endif

        @isset($msg)
            <p>{{$msg}}</p>
        @endisset


    <form action="{{route('loginPost')}}" method="POST">

        @csrf

            <label for="usuario">Email</label>
            <input type="text" id="usuario" name="email">

            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="password">

            <button type="submit">Iniciar Sesión</button>

        </form>
        
    </div>

@endsection