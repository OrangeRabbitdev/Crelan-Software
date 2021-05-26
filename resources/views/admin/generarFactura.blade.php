@extends('layout.panel')

@section('content')

@isset($msgSuccess)
    <h2>{{$msgSuccess}}</h2>
@endisset

@isset($msgError)
    <h2>{{$msgError}}</h2>
@endisset

    <div class="main-container dc3FormContainer">
        <form action="{{route('sendBill')}}" method="post" enctype="multipart/form-data">
            @csrf

            <h2>Datos de la factura</h2>

            <span>
                <div>
                    <label for="fileName">Nombre factura (opcional)</label>
                    <input type="text" name="fileName" id="fileName">
                </div>
            </span>

            <span>

                <div>
                    <label for="billFile">Adjuntar factura</label>
                    <input type="file" name="file" id="billFile">
                </div>

                <div>
                    <label for="dateEnd">Fecha de corte</label>
                    <input type="date" name="dateEnd" id="dateEnd">
                </div>
                
            </span>


            <h2>Datos de notificación</h2>


            <span>

                <div>
                    <label for="billFile">Correo electrónico del Cobrador</label>
                    <input type="email" name="correoCobrador">
                </div>

                <div>
                    <label for="dateEnd">Correo electrónico del Deudor</label>
                    <input type="email" name="correoDeudor">
                </div>
                
            </span>

            <h2>Datos de Empresa</h2>


            <span>
                <div>
                    <label for="nombreEmpresa">Nombre de la Empresa</label>
                    <input type="text" id="nombreEmpresa" name="nombreEmpresa">
                </div>            
            </span>




            <input type="submit">



            <!-- DATOS BÁSICOS  -->
 

        </form>
    </div>

@endsection

