

@extends('layout.panel')

@section('content')

<div class="main-container">

    <div class="userAdmin-container">

        <div class="title-in-panel-container">
            <h2>Administrar Archivos</h2>

            <p>Subir archivo nuevo</p>

            <form action="{{route('uploadFiles')}}" method="post" enctype="multipart/form-data" class="forms-panel">
                @csrf

                @isset($msg)
                    {{$msg}}
                @endisset
        
                @isset($msgSuccess)
                {{$msgSuccess}}
                @endisset

            <input type="file" name="file">
        
            <label for="fileName">Nombre de Archivo <i>(Opcional)</i></label>
            <input type="text" name="fileName" id="fileName">
    
            <input type="submit" value="Enviar">
        </form>

        </div>


        <div class="title-in-panel-container">
            <h2>Información de Archivos</h2>
        </div>

        <div class="search-container">
            <img src="img/icons/search.png">
            <input type="text" id="myInput" onkeyup="searching()" placeholder="Buscar resultados">
        </div>

        <table class="general-table" id="myTable">

            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Tamaño de Archivo</th>
                    <th>Descargar</th>
                    @if (Auth::user()->rol == 'Administrador')
                    <th>Eliminar</th>    
                    @endif
                    
                </tr>
            </thead>

            <tbody>                
                @foreach ($filesCollection as $file)
                <tr>
                    <td>{{$file->getFilename()}}</td>
                    <td>{{$file->getSize()}} Bytes</td>
                    <td><a href="{{ route('downloadFile', $file->getFilename()) }}"> <img src="img/icons/donwload.png"> </a></td>
                    @if (Auth::user()->rol == 'Administrador')
                    <td><a href="{{route('deleteFile', $file->getFilename()) }}"> <img src="img/icons/delete.png"> </a></td>    
                    @endif
                </tr>
                @endforeach
            </tbody>

        </table>




    </div>

</div>

@endsection

<script src="js/search.js"></script>