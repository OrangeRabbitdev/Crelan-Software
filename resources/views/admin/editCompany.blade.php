@extends('layout.panel')

@section('content')

<div class="main-container">

    <div class="userAdmin-container">
        <div class="title-in-panel-container">
            <h2>Editando esta empresa: {{$datosEmpresa[0]->nombre_empresa}}</h2>
        </div>


        <form action="{{route('postEditCompany', $datosEmpresa[0]->id)}}" method="POST" class="forms-panel">
            @csrf
            
            <p>
                @isset($msgSuccess)
                    {{$msgSuccess}}
                @endisset
            </p>

            <label for="newName">Nuevo Nombre</label>
            <input type="text" name="newNombre">

            <label for="newRepresentante">Nuevo Representante Legal</label>
            <input type="text" name="newRepresentante">
            
            <label for="newServicioOProducto">Nuevo Servicio o Producto</label>
            <input type="text" name="newServicioOProducto">

            <label for="newServicioOProducto">Nueva Cantidad de Empleados</label>
            <input type="text" name="newEmpleados">

            <label for="newServicioOProducto">Nuevo Responsable de Inmueble</label>
            <input type="text" name="newResponsableInmueble">

            <label for="newPhone1">Nuevo Teléfono 1</label>
            <input type="text" name="newPhone1">

            <label for="newPhone2">Nuevo Teléfono 2</label>
            <input type="text" name="newPhone2">
            
            <label for="newEmail">Nuevo Correo Electrónico</label>
            <input type="text" name="newEmail">

            <label for="newAdress">Nueva Dirección</label>
            <input type="text" name="newAdress">
            
            <label for="newFechaInicio">Cambiar fecha inicio de operaciones</label>
            <input type="text" name="newFechaInicio">
            
            <label for="newCoordenadas">Nuevas Coordenadas</label>
            <input type="text" name="newCoordenadas">

            <input type="submit" value="Actualizar">

        </form>

    </div>

</div>
@endsection