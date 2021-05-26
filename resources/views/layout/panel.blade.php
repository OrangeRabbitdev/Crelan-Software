<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('estilos/main.css') }}">
    <title>Software</title>
</head>
<body>

    <div class="panel-main-container">
        


    <div class="left-panel">

        <div class="panel-title-container">
            <h2>
                Bienvenido <br>{{Auth::user()->nombre}}
            </h2>
    
            <p>
                Rol
                {{Auth::user()->rol}}
            </p>
    
        <a href="{{route('logout')}}">Cerrar Sesión</a>
        </div>
    
    
        <div class="scrolling-container">
            <ul class="option-list">

                @if(Auth::user()->rol == 'Administrador')
                <li @if(Request::url() == route('userAdmin')) class="button-selected" @endif> <img src="{{ asset('img/icons/user.png') }}"> <a href="{{route('userAdmin')}}">Administrar Usuarios</a></li>
                <li @if(Request::url() == route('userCompany')) class="button-selected" @endif> <img src="{{ asset('img/icons/company.png') }}"> <a href="{{route('userCompany')}}">Administrar Empresas</a></li>
                @endif

                <li @if(Request::url() == route('showFiles') || Request::url() == route('uploadFiles')) class="button-selected" @endif> <img src="{{ asset('img/icons/files.png') }}"> <a href="{{route('showFiles')}}">Archivos</a></li>
                <li @if(Request::url() == route('showFiles') || Request::url() == route('uploadFiles')) class="button-selected" @endif> <img src="{{ asset('img/icons/files.png') }}"> <a href="{{route('showFiles')}}">DC3</a></li>
                <li @if(Request::url() == route('dc3Documents')) class="button-selected" @endif> <img src="{{ asset('img/icons/dc3.png') }}"> <a href="{{route('dc3Documents')}}">Generar Documentos DC3</a></li>
                <li @if(Request::url() == route('MostrarDc3')) class="button-selected" @endif> <img src="{{ asset('img/icons/dc3.png') }}"> <a href="{{route('MostrarDc3')}}">Consultar Documentos DC3</a></li>
                <li @if(Request::url() == route('generarFactura')) class="button-selected" @endif> <img src="{{ asset('img/icons/factura.png') }}"> <a href="{{route('generarFactura')}}">Generar Factura</a></li>
            </ul>
        </div>
        
    </div>
    
    
     @yield('content')

    </div>


    <script src="js/jquery.js"></script>
    <script src="js/filter-inputs.js"></script>

</body>
</html>