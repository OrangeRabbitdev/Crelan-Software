@extends('layout.panel')

@section('content')

<div class="main-container">

    <div class="userAdmin-container">

        <div class="title-in-panel-container">
            <h2>Administrar Empresas</h2>
    
            <span>
                <a href="{{route('registrarEmpresa')}}">Crear nueva</a>
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
                    <th>Representante</th>
                    <th>Servicio o Producto</th>
                    <th>Empleados Totales</th>
                    <th>Responsable del Inmueble</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Correo Electrónico</th>
                    <th>Dirección</th>
                    <th>Fecha Inicio de Operaciones</th>
                    <th>Coordenadas de Google Maps</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Descargar dc3 Master</th>
                </tr>
            </thead>
    
            <tbody>
    
            @foreach ($datosEmpresa as $dato)    
                <tr>
                    <td>{{$dato->nombre_empresa}}</td>
                    <td>{{$dato->representante_legal}}</td>
                    <td>{{$dato->servicio_o_producto}}</td>
                    <td>{{$dato->empleados_totales}}</td>
                    <td>{{$dato->responsable_inmueble}}</td>
                    <td>{{$dato->telefono1}}</td>
                    <td>{{$dato->telefono2}}</td>
                    <td>{{$dato->correo_electronico}}</td>
                    <td>{{$dato->direccion}}</td>
                    <td>{{$dato->fecha_inicio_operaciones}}</td>
                    <td>{{$dato->coordenadas}}</td>
    
                    <td><a href="{{route('editCompany', $dato->id)}}"> <img src="img/icons/edit-user.png"> </a></td>
                    <td><a href="{{route('deleteCompany', $dato->id)}}"><img src="img/icons/delete.png" alt=""></a></td>
                    <td><a href="{{route('getDc3Master', $dato->id)}}"><img src="img/icons/donwload.png"></a></td>
                </tr>
            @endforeach 
    
            </tbody>
    
        </table>
    
    </div>
</div>

@endsection

<script src="js/search.js"></script>