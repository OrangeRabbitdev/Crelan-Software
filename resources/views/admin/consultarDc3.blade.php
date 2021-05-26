@extends('layout.panel')

@section('content')
    <div class="main-container">

        <form action="{{route('Dc3porEmpresa')}}">
            <select name="empresa" onchange="this.form.submit()">
                    <option disabled selected value="NaN">Seleccionar Empresa</option>
                @foreach ($data as $item)
                    <option value="{{$item->nombre_empresa}}">{{$item->nombre_empresa}}</option>
                @endforeach
            </select>
        </form>

        @isset($dc3Data)
            
        <div class="tables-container">
            <table class="general-table">
                <thead>
                    <tr>
                        <th>Nombre del empleado</th>
                        <th>Nombre de la empresa</th>
                        <th></th>
                        <th>Fecha de subida</th>
                    </tr>
                </thead>


                <tbody>

                    @foreach ($dc3Data as $item)
                    <tr>
                        <td>{{$item->nombre_razonSocial_empresa}}</td>
                        <td>{{$item->nombre_empleado}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    @endforeach    
                </tbody>

            </table>
        </div>

        @endisset





    </div>
@endsection



<script>



</script>