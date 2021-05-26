@extends('layout.panel')

@section('content')
<div class="main-container">

    <div class="userAdmin-container">

        <div class="title-in-panel-container">
            <h2>Consultar documentos DC3</h2>
        </div>

        <div class="search-container">
            <img src="img/icons/search.png">
            <input type="text" id="myInput" onkeyup="searching()" placeholder="Buscar resultados">
        </div>  

        <div class="tables-container">

            <table class="general-table no-margin myTable" id="myTable">
                <thead>
                    <tr>
                        <th>Nombre del Empleado</th>
                    </tr>    
                </thead>
    
                <tbody>
                    @foreach ($nombre_empleado as $item)
                    <tr>
                        <td>{{$item->nombre_empleado}}</td>    
                    </tr>
                    @endforeach     
                </tbody>
    
            </table>



            <table class="general-table no-margin myTable">
                <thead>
                    <tr>
                        <th>Nombre del Curso</th>
                    </tr>    
                </thead>
    
                <tbody>
                    @foreach ($nombre_curso as $item)
                    <tr>
                        <td>{{$item->nombreCurso}}</td>    
                    </tr>
                    @endforeach     
                </tbody>
    
            </table>




            <table class="general-table no-margin myTable">
                <thead>
                    <tr>
                        <th>Nombre de la Empresa</th>
                    </tr>    
                </thead>
    
                <tbody>
                    @foreach ($nombre_empresa as $item)
                    <tr>
                        <td>{{$item->nombre_razonSocial_empresa}}</td>    
                    </tr>
                    @endforeach     
                </tbody>
    
            </table>








            <table class="general-table no-margin myTable">

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
                        <td class="no-margin"><a href="{{ route('downloadPdf', $file->getFilename()) }}"> <img src="img/icons/donwload.png"> </a></td>
                        @if (Auth::user()->rol == 'Administrador')
                        <td class="no-margin"><a href="{{route('deletePdf', $file->getFilename()) }}"> <img src="img/icons/delete.png"> </a></td>    
                        @endif
                    </tr>
                    @endforeach
                </tbody>
    
            </table>    


            
        </div>




    </div>

</div>
@endsection

<script src="js/search.js"></script>