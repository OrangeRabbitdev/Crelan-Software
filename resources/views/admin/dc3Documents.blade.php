@extends('layout.panel')

@section('content')
    

    <div class="main-container dc3FormContainer">

        <form action="{{route('GenerateDocument')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <h2>Datos del trabajador</h2>

            <span>
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name">
                </div>

                <div>
                    <label for="claveUnica">Clave única de registro de población (CURP)</label>
                    <input type="text" name="claveUnica" id="clave" autocomplete="off">
                </div>



            </span>

            <span>
                <div>
                    <label for="ocupacion">Ocupación especifica</label>
                    <input type="text" name="ocupacion" id="ocupacion">
                </div>

                <div>
                    <label for="puesto">Puesto</label>
                    <input type="text" name="puesto" id="puesto">
                </div>
            </span>

            <h2>Datos de la empresa</h2>

            <span>
                <div>
                    <label for="nombreOrazonSocial">Nombre o razón social (En caso de persona física, anotar apellido paterno, apellido matrno y nombre)</label>
                    <input type="text" id="nombreOrazonSocial" name="nombreOrazonSocial">
                </div>

                <div>
                    <label for="actividadEmpresa">Actividad giro principal</label>
                    <input type="text" id="actividadEmpresa" name="actividadEmpresa">
                </div>
            </span>

            <span>
                <div>
                    <label for="registroFederal">Registro Federal de Contribuyentes (SHCP)</label>
                    <input type="text" name="registroFederal" id="clave">
                </div>

                <div>
                    <label for="registroPatronal">Registro Patronal del I.M.S.S</label>
                    <input type="text" id="registroPatronal" name="registroPatronal">
                </div>
            </span>









            <h2>Datos del programa de capacitación<br>adiestramiento y productividad</h2>

            <span>
                <div>
                    <label for="nombreCurso">Nombre del curso</label>
                    <input type="text" id="nombreCurso" name="nombreCurso">
                </div>

                <div>
                    <label for="duracionCurso">Duración en horas</label>
                    <input type="text" id="duracionCurso" name="duracionCurso">
                </div>
            </span>

            <span>
                <div>
                    <label for="ejecucionDesde">Periodo de ejecución desde</label>
                    <input type="date" id="ejecucionDesde" name="ejecucionDesde">
                </div>

                <div>
                    <label for="ejecucionHasta">Hasta</label>
                    <input type="date" name="ejecucionHasta" id="ejecucionHasta">
                </div>
            </span>

            <span>
                <div>
                    <label for="areaTematicaCurso">Área temática del curso</label>
                    <input type="text" id="areaTematicaCurso" name="areaTematicaCurso">
                </div>

                <div>
                    <label for="nombreYFirmaCurso">Nombre y firma del instructor (Interno o externo)</label>
                    <input type="file" name="firmaImageInstructor">
                    <input type="text" name="nombreYFirmaCurso" id="nombreYFirmaCurso">
                </div>
            </span>


            <span>
                <div>
                    <label for="firmaRepresentanteLegal">Nombre y firma (Pattrón o representanre legal 4/)</label>
                    <input type="file" name="firmaImageRepresentanteLegal">
                    <input type="text" name="firmaRepresentanteLegal" id="firmaRepresentanteLegal" placeholder="Nombre aquí">
                </div>

                <div>
                    <label for="firmaRepresentanteTrabajadores">Nombre y firma (Representante de los trabajadores 5/)</label>
                    <input type="file" name="firmaImageRepresentanteTrabajadores">
                    <input type="text" name="firmaRepresentanteTrabajadores" id="firmaRepresentanteTrabajadores" placeholder="Nombre aquí">
                </div>
            </span>


            <input type="submit">

        </form>

    </div>


@endsection