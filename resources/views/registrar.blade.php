@extends('layout.general')

@section('content')

    @if (Request::url() == route('registrar'))
        
    <div class="form-container absolute-container gray-background">


       
        @if(count($errors) > 0)
            
            <p>{{$errors->first()}}</p>
    
        @endif

        @isset($msg)
           <p>{{$msg}}</p>
        @endisset

        @isset($msgSuccess)
            <div class="success">
                <h4>{{$msgSuccess}}</h4>
                <a href="{{route('home')}}">Volver</a>
            </div>
            
        @endisset



    <form method = "POST" action="{{route('registrar')}}">
        <h2>Registrar usuario nuevo</h2>
        @csrf
                    <label for="Nombre">Nombre</label>
                    <input autocomplete="off" type="text" id="Nombre" name="name">

                    <label for="Apellidos">Apellidos</label>
                    <input autocomplete="off" type="text" id="Apellidos" name="lastName">



            <label for="Email">Email</label>
            <input autocomplete="off" type="text" id="Email" name="email">

            <label for="Passowrd">Contraseña</label>
            <input autocomplete="off" type="password" id="Password" name="password">

            <label for="Confirm-Passowrd">Confirmar Contraseña</label>
            <input autocomplete="off" type="password" id="Confirm-Password" name="confirmPassword">

            <label for="rol">Rol</label>
            <select name="rol" id="rol">
                @foreach ($roles as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>

            <button type="submit">Registrar Usuario</button>

        </form>

    </div>

    <div class="success">
        <h2>¡Usuario Creado!</h2>
    </div>









    @elseif(Request::url() == route('registrarEmpresa'))

    <div class="form-container absolute-container gray-background">

    <form method = "POST" action="{{route('registrarEmpresaPost')}}">
        <h2>Registrar empresa nueva</h2>

        @if(count($errors) > 0)
            
        <p class="Errors">{{$errors->first()}}</p>

        @endif

        @isset($msg)
        <p class="Errors">{{$msg}}</p>
        @endisset

        @isset($msgSuccess)
            <div class="success">
                <h4>{{$msgSuccess}}</h4>
                <a href="{{route('home')}}">Volver</a>
            </div>
            
        @endisset

        @csrf
            <label for="nombreEmpresa">Nombre</label>
            <input autocomplete="off" type="text" id="nombreEmpresa" name="nombreEmpresa">

            <label for="representante">Representante</label>
            <input autocomplete="off" type="text" id="representante" name="representante">

            <label for="servicioProducto">Servicio o Producto</label>
            <input autocomplete="off" type="text" id="servicioProducto" name="servicioProducto">

            <label for="numeroEmpleados">Número de Empleados</label>
            <input autocomplete="off" type="text" id="numeroEmpleados" name="numeroEmpleados">

            <label for="responsableInmueble">Responsable del Inmueble <i>(Opcional)</i></label>
            <input autocomplete="off" type="text" id="responsableInmueble" name="responsableInmueble">

            <label for="telefono">Teléfono</label>
            <input autocomplete="off" type="text" id="telefono" name="telefono">
            
            <label for="telefono2">Teléfono 2 <i>(Opcional)</i></label>
            <input autocomplete="off" type="text" id="telefono2" name="telefono2">

            <label for="correo">Correo de la empresa</label>
            <input autocomplete="off" type="text" id="correo" name="correo">

            <label for="direccion">Dirección</label>
            <input autocomplete="off" type="text" id="direccion" name="direccion">

            <label for="fechaInicio">Fecha de inicio de operaciones de la empresa <i>(Opcional)</i></label>
            <input autocomplete="off" type="text" id="fechaInicio" name="fechaInicio">

            <label for="coordenadas">Coordenadas de Google Maps <i>(Opcional)</i></label>
            <input autocomplete="off" type="text" id="coordenadas" name="coordenadas">


            <button type="submit">Registrar Empresa</button>
            
            <a href="{{route('home')}}" id="panel-link">Ir al panel</a>

        </form>

    </div>

    <div class="success">
        <h2>¡Empresa Creada!</h2>
    </div>

    @endif









@endsection