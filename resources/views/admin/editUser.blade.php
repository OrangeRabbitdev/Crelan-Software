@extends('layout.panel')

@section('content')

<div class="main-container">

        <div class="userAdmin-container">
            <div class="title-in-panel-container">
                <h2>Editando este usuario: {{$datos[0]->nombre}}</h2>
            </div>


            <form action="{{route('postEditUser', $datos[0]->id)}}" method="POST" class="forms-panel">

                @csrf

                <label for="newNombre">Nuevo Nombre</label>
                <input type="text" name="newNombre" id="newNombre">
                
                <label for="newApellidos">Nuevos Apellidos</label>
                <input type="text" name="newApellidos" id="newApellidos">

                <label for="newEmail">Nuevo Correo Electrónico</label>
                <input type="text" name="newEmail" id="newEmail">

                <label for="newRol">Cambiar Rol</label>
                <select name="newRol" id="newRol">
                    <option value="Seleccionar">Seleccionar</option>
                    @foreach ($roles as $rol)
                            <option value="{{$rol->rol}}">{{$rol->rol}}</option>
                    @endforeach
                </select>

                <input type="submit" value="Actualizar">

            </form>

        </div>

        
</div>
    
@endsection