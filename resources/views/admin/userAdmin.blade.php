@extends('layout.panel')

@section('content')

    <div class="main-container">

        <div class="userAdmin-container">

            <div class="title-in-panel-container">
                <h2>Administrar Usuarios</h2>

                <span>
                    <a href="{{route('registrar')}}">Crear nuevo</a>
                </span>

            </div>

            <div class="search-container">
                <img src="img/icons/search.png">
                <input type="text" id="myInput" onkeyup="searching()" placeholder="Buscar resultados">
            </div>


            <table class="general-table" id="myTable">
                
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Creado en</th>
                        <th>Editar datos</th>
                        <th>Inhabilitar</th>
                    </tr>
                </thead>

                <tbody>

                @foreach ($datos as $dato)    
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        <td>{{$dato->apellidos}}</td>
                        <td>{{$dato->email}}</td>
                        <td>{{$dato->estado}}</td>
                        <td>{{$dato->rol}}</td>
                        <td>{{$dato->created_at}}</td>
                        <td><a href="{{route('editUser', $dato->id)}}"> <img src="img/icons/edit-user.png"> </a></td>
                        <td><form id="deactivateForm" action="{{route('deactivateUser', $dato->id)}}" method="post"> @csrf <input @if($dato->estado == 'inactivo') checked @endif type="checkbox" name="estado" onclick="this.form.submit()"></form></td>
                    </tr>
                @endforeach 

                </tbody>

            </table>
       
        </div>

    </div>


@endsection

<script src="js/search.js"></script>