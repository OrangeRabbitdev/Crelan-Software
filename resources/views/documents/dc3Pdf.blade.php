<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <style>

        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }

        p{
            font-size: .85em;
        }

        .generatedDc3{
            display: table;
            width:95%;
            margin: auto;
            border-collapse: collapse;
        }   

        .table-general-text{
            width: 95%;
            margin: auto;
        }
        
        .empty-table{
            border:none;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid #000;
            padding: .5em;
        }


        .firmaImage{
            text-align: center;
            width: 5em;
        }

        .main-title-empty h2{
            text-align: center;
            font-size: 1.2em;
            margin-top: 1em;
        }

        .table-title{
            background-color: #000;
            color: #fff;
            padding:.5em 0 .5em 0;
            text-align: center;
            font-size: .9em;
        }

        .table-center{
            text-align: center;
        }

        .table-bold{
            font-weight: bold;
        }

        .tb-margin-bottom{
            margin-bottom: 7em;
        }

        .tb-underline{
            border-bottom: 1px solid #000 !important;
        }

        .align-center{
            text-align: center;
            padding: .5em 0 .5em 0
        }

        .no-border{
            border: 0;
        }

        .border-top{
            border: 0;
            border-top: 1px solid #000;
        }

        .margin{
            margin: 1em;
            width: 80%;
        }

        .no-padding{
            padding-bottom: 0 !important;
            margin-bottom: 0 !important;
        }

    </style>
</head>
<body>
    <div class="main-title-empty">
        <h2 style="text-align: center;">FORMATO DC-3<br>CONSTANCIA DE COMPETENCIAS O HABILIDADES LABORALES</h2>
        <!--
        <span>
            <a class="buttons" href="{{route('home')}}">Volver</a>
            <a class="buttons" href="{{route('downloadPDF')}}">Descargar PDF</a>
        </span>
    -->
    </div>
    
    
    <!-- DATOS DEL TRABAJADOR -->
    
    <table class="generatedDc3">
        

        <tbody>

            <tr>
                <td class="table-title" colspan="2">DATOS DEL TRABAJADOR</td>
            </tr>
            
                <tr class="tb-group">
                    <td colspan="2">
                            <p>Nombre (Anotar apellido paterno, apellido materno y nombre)</p>
                            <p class="table-center table-bold">{{$data['name']}}</p>
                    </td>
                </tr>
    
    
                <tr class="tb-group no-padding">
                    <td class="no-padding">
                        <p>Clave Única de Registro de Población (CURP)</p>
                        <p class="table-bold no-padding">{{$data['claveUnica']}}</p>
                    </td>

                    <td width="40%">
                        <p>Ocupación específica (Catálogo Nacional de Ocupaciones) 1/</p>
                        <p class="table-center table-bold">{{$data['ocupacion']}}</p>
                    </td>
                </tr>
    
    
                <tr class="tb-group">
                    <td colspan="2">
                        <span>
                            <p>Puesto *</p>
                            <p class="table-bold">{{$data['puesto']}}</p>
                        </span>
                    </td>
                </tr>
    
    
        </tbody>
    
    </table>
    
    
    
    <!-- DATOS DE LA EMPRESA -->
    
    
    <table class="generatedDc3">
    
        <tbody>

            <tr>
                <td colspan="2" class="table-title">
                    DATOS DE LA EMPRESA
                </td>
            </tr>
    
                <tr class="tb-group">
                    <td colspan="2">
                            <p>Nombre o razón social (En caso de persona física, anotar apellido paterno, apellido matrno y nombre)</p>
                            <p class="table-center table-bold">{{$data['nombreOrazonSocial']}}</p>
                    </td>
                </tr>
    
    
                <tr class="tb-group">
                    <td colspan="2">
                            <p>Registro Federal de Contribuyentes (SHCP)</p>
                            <p class="table-bold">{{$data['registroFederal']}}</p>
                    </td>
                </tr>
    
    
    
        </tbody>
    
    </table>
    
    
    
    
    
    
    
    
    
    
    
    <!-- DATOS DE LA EMPRESA -->
    
    
    <table class="generatedDc3">
    
        <tbody>

            <tr>
                <td colspan="4" class="table-title">
                    DATOS DEL PROGRAMA DE CAPACITACIÓN, ADIESTRAMIENTO Y PRODUCTIVIDAD
                </td>
            </tr>
    
                <tr class="tb-group">
                    <td colspan="4">
                         <p>Nombre del curso</p>
                         <p class="table-center table-bold">{{$data['nombreCurso']}}</p>
                    </td>
                </tr>
    
    
                <tr class="tb-group">
                    <td width="100%" class="tb-group-horizontal">
                            <p>Duración en horas</p>
                            <p class="table-bold table-center">{{$data['duracionCurso']}}</p>
                    </td>
    
                     <td width="100%">
                         <p>Periodo de ejecución de</p>
                         <p class="table-center table-bold">{{$data['ejecucionDesde']}}</p>
                     </td>
 
                     <td width="100%">
                         <p class="table-center">a</p>
                         <p></p>
                     </td>
 
                     <td width="100%">
                         <p class="table-center table-bold">{{$data['ejecucionHasta']}}</p>
                    </td>
                </tr>
    
    
                <tr class="tb-group">
                    <td colspan="4">
                            <p>Área temática del curso 2/</p>
                            <p class="table-center table-bold">{{$data['areaTematicaCurso']}}</p>
                    </td>
                </tr>
    
    
                <tr class="tb-group">
                    <td colspan="4">
                            <p>Nombre del agente capacitador o STPS 3/</p>
                            <p class="table-center table-bold">{{$data['nombreYFirmaCurso']}}</p>
                    </td>
                </tr>

            </tbody>
    
        </table>



        <table class="generatedDc3">

            <tbody>

                <tr>
                    <td colspan="3">
                        <p class="table-center table-bold">Los datos se asientan en esta constancia bajo protesta de decir la verdad, apercibios de la responsabilidad en que incurre todo aquel que no se conduce con la verdad.</p>                        
                    </td>
                </tr>

                <tr>
                    <td class="table-center table-bold tb-margin-bottom no-border">Instructor o tutor</td>
                    <td class="table-center table-bold tb-margin-bottom no-border">Patrón o representante legal 4/</td>
                    <td class="table-center table-bold tb-margin-bottom no-border">Representante de los trabajadores 5/</td>
                </tr>

                <tr>

                    <td class="align-center no-border"> <img src="{{$data['imageFirmaInstructor']}}" class="firmaImage"></td>
                    <td class="align-center no-border"> <img src="{{$data['imageFirmaRepresentanteLegal']}}" class="firmaImage"></td>
                    <td class="align-center no-border"> <img src="{{$data['imageFirmaRepresentanteTrabajadores']}}" class="firmaImage"></td>

                </tr>

                <tr>
                    <td class="tb-underline table-center no-border">{{$data['nombreYFirmaCurso']}}</td>
                    <td class="tb-underline table-center no-border">{{$data['firmaRepresentanteLegal']}}</td>
                    <td class="tb-underline table-center no-border">{{$data['firmaRepresentanteTrabajadores']}}</td>
                </tr>

                <tr>
                    <td class="table-center no-border">Nombre y firma</td>
                    <td class="table-center no-border">Nombre y firma</td>
                    <td class="table-center no-border">Nombre y firma</td>
                </tr>


            </tbody>

        </table>

        <div class="table-general-text">

            <h3>NOTAS</h3>
            <p>Llenar a máquina o con letra de molde</p>
            <p>Deberá entregarse al trabajador dentro de los veinte días hábiles siguientes al término del curso de capacitación aprobado.</p>
            <p>1/ Las áreas y subáreas ocupacionales del Cátalogo Nacional de Ocupaciones se encuentran disponibles en el reverso de este formato y en la página www.stps.gob.x</p>
            <p>2/ Las áreas temáticas de los cursos se encuentran disponibles en el reverso de este formato y en la página www.stps.gob.mx</p>

        </div>

        
    
</body>
</html>

