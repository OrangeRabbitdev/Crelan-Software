<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .general-width{
            width: 80%;
            margin: auto;
        }

        table{
            border-collapse: separate;
            border-spacing: 0;
        }


        .table-title{
            background-color: #000;
            padding: .6em;
        }

        .table-title th{
            font-size:.75em;
            color: #fff;
            text-align: center;
        }

        .center{
            text-align: center;
        }

        td, th{
            border: solid .6px #000;
            font-size: .7em;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            outline: 1px solid #000;
        }

        .full-width{
            width: 100%;
        }

        .uppercase{
            text-transform: uppercase;
        }

        .bold{
            font-weight: bold;
        }

        .left-align{
            text-align: left !important;
        }

        .general-padding{
            padding: .6em;
        }

        .border{
            border: .6px solid #000;
        }

        .no-border{
            border: none !important;

        }

        .light{
            font-weight: lighter;
        }

        .border-bottom{
            border: none !important;
            border-bottom: .6px solid #000 !important; 
            border-right: .6px solid #000;
            border-left: .6px solid #000;
        }

        .yes-border{
            border: .6px solid #000 !important;
        }

        .margin-top{
            margin-top: 5em;
        }

        .padding-left{
            padding: .6em;
        }

        img{
            width: 4.5em;
            text-align: center;
        }

    </style>
</head>
<body>
<!--
    <div class="main-title-empty">
        <h2>DATOS DEL TRABAJADOR</h2>
    </div>
-->

    <table class="general-width">


    </table>

    <table class="general-width margin-top">
            
        <tr class="table-title">
            <th class=" general-padding" colspan="2">DATOS DE LA EMPRESA</th>
        </tr>


            <tr>
                <th class="left-align general-padding no-border light" colspan="2">Nombre o razón social (En caso de persona física, anotar apellido parterno, apellido materno y nombre) <br><br> <p class="bold">{{$data[0]->nombre_razonSocial_empresa}}<p></th>
            </tr>


        <tr>
            <th colspan="2" class="left-align general-padding no-border light">Actividad giro principal <br> <br> <p class="bold">{{$data[0]->actividad_principal_empresa}}</p></th>
        </tr>


        <tr>
            <th class="general-padding no-border light left-align">Registro Federal de Contribuyentes(SHCP) <br> <br> <p class="bold">{{$data[0]->registro_federal_empresa}}</p></th>
            <th class="general-padding no-border light left-align">Registro patronal del I.M.S.S <br><br> <p class="bold">{{$data[0]->registro_patronal_empresa}}</p></th>
        </tr>



        <tr class="table-title">
            <th colspan="2" class="general-padding">DATOS DEL TRABAJADOR</th>
        </tr>

        <tr>
            <th class="left-align light general-padding">Clave Única de Registro de Población (CURP)</th>
            <th class="left-align light general-padding">Nombre (Anotar apellido parterno, apellido materno y nombre)</th>
            <th class="left-align light general-padding">Ocupación específica (Catálogo Nacional de Ocupaciones) 1/</th>
        </tr>

        @foreach ($data as $item)
        <tr>
            <td class="bold">{{$item->clave_unica}}</td>
            <td class="uppercase bold">{{$item->nombre_empleado}}</td>
            <td class="center">{{$item->ocupacion}}</td>
        </tr>            
        @endforeach

        
            <tr>
                <td style="height: 1.5em;" colspan="2"></td>
            </tr>


        <tr class="table-title">
            <th class=" general-padding" colspan="2">DATOS DEL PROGRAMA DE CAPACITACIÓN Y ADIESTRAMIENTO</th>
        </tr>

        <tr>
            <th class="left-align general-padding no-border light" colspan="2">Nombre del programa o curso <br> <br> <p class="bold">{{$data[0]->nombreCurso}}</p></th>
        </tr>

        <tr>
            <th class="light">Duración en horas <br><br> <p class="bold left-align">{{$data[0]->duracion_horas_curso}}</p></th>
            <th>Periodo de ejecución De</th>
            <th class="bold">{{$data[0]->periodo_ejecucion_desde}}</th>
            <th>a</th>
            <th class="bold">{{$data[0]->periodo_ejecucion_hasta}}</th>
        </tr>

        <tr>
            <th colspan="2" class="left-align">Área temática del curso 2/ <br> <br> <p class="bold">{{$data[0]->area_tematica_curso}}</p></th>
        </tr>

        <tr>
            <th colspan="2" class="left-align">Nombre y firma del instructor (Interno o Externo) <br><br> <p class="bold">{{$data[0]->nombre_firma_instructor}}</p></th>
        </tr>

        <tr>
            <td colspan="2" style="height: 1.5em"></td>
        </tr>

        <tr>
            <th colspan="2">            
                <p class="bold"> Los datos se asientan en esta constancia bajo protesta de decir la verdad, apercibidos de la responsabilidad en que incurre todo aquel que no se conduce con la verdad </p><br>
                <p class="light">Representantes de la Comisión Mixta de Capacitación y Adiestramiento </p>

                <br>
                <br>

            </th><br>

        </tr>

        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>


        <tr>

            <td class="center">

                    <p class="center">Capacitador</p>
                    <br>
                    <img class="center" src="{{$data[0]->ruta_firma_instructor}}">
                    <p class="center">{{$data[0]->nombre_firma_instructor}}</p>
                    <p class="center general-padding">Nombre y firma</p>
 
            </td>


            <td class="center">

                    <p class="center">Por la empresa</p>
                    <br>
                    <img class="center" src="{{$data[0]->ruta_firma_representanteLegal}}">
                    <p class="center">{{$data[0]->nombre_firma_representanteLegal}}</p>
                    <p class="center general-padding">Nombre y firma</p>

            </td>



            <td class="center">


                    <p class="center">Por los capacitadores</p>
                    <br>
                    <img class="center" src="{{$data[0]->ruta_firma_representanteTrabajadores}}">
                    <p class="center">{{$data[0]->nombre_firma_representanteTrabajadores}}</p>
                    <p class="center general-padding">Nombre y firma</p>

    
            </td>

        </tr>







    </table>
    
</body>
</html>