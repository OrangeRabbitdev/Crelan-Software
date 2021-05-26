<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Empresa;
use App\Files;
use App\dc3Users;
use App\facturacion;
use Auth;
use DB;
use Storage;
use File;
use Excel;
use Response;
use PDF;

class AdminController extends Controller
{
    //GENERAL VALS

    public function index(){
        return view('login');
    }

    public function registrar(){
        return view('registrar');
    }

    public function registrarEmpresa(){
        return view('registrar');
    }

    public function files(){
        return view('admin.files');
    }

    public function dc3Documents(){
        return view('admin.dc3Documents');
    }


    //Vistas con parametros
    public function UserAdmin(){
        $datos = DB::table('usuarios_plataforma')->get();

        return view('admin.userAdmin', ['datos' => $datos]);
    }

    public function userCompany(){
        $datosEmpresa = DB::table('usuarios_empresa')->get();

        return view('admin.userCompany', ['datosEmpresa' => $datosEmpresa]);
    }




    public function postRegistrar(Request $request){

        //if exists
        $exists = Usuario::where('email', $request->email)->first();

        if($exists == null){
            $this->validate($request, [
                'name'=>'required', 
                'lastName'=>'required', 
                'password'=>'required|required_with:confirmPassword|same:confirmPassword|min:6', 
                'email'=>'required|email']);
    
    
            $user = new Usuario;
            $user->nombre = $request->name;
            $user->apellidos = $request->lastName;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->estado = 'activo';
            $user->save();
            
            if($user){
                //Auth::login($user);
                
                $msgSuccess = "¡Usuario Registrado!";
                return view('registrar', ['msgSuccess' => $msgSuccess]);   
            }
        }else{
            $msg = "El usuario ya existe";
            return view('registrar', ['msg' => $msg]);
        }
    }

    public function postRegistrarEmpresa(Request $request){

        $exists = Empresa::where('nombre_empresa', $request->nombreEmpresa)->first();

        $this->validate($request, [
            'nombreEmpresa'=>'required',
            'representante'=>'required',
            'servicioProducto'=>'required',
            'numeroEmpleados'=>'required',
            'telefono'=>'required',
            'correo'=>'email|required',
            'direccion'=>'required',
        ]);

        if($exists == null){

            //$query = DB::table('')


            $empresa = new Empresa;

            $empresa->nombre_empresa = $request->nombreEmpresa;
            $empresa->representante_legal = $request->representante;
            $empresa->servicio_o_producto = $request->servicioProducto;
            $empresa->empleados_totales = $request->numeroEmpleados;
            $empresa->responsable_inmueble = $request->responsableInmueble;
            $empresa->telefono1 = $request->telefono;
            $empresa->telefono2 = $request->telefono2;
            $empresa->correo_electronico = $request->correo;
            $empresa->direccion = $request->direccion;
            $empresa->fecha_inicio_operaciones = $request->fechaInicio;
            $empresa->coordenadas = $request->coordenadas;
            $empresa->save();
    
            if($empresa){
                $msgSuccess = "¡Empresa Registrada!";
                return view('registrar', ['msgSuccess' => $msgSuccess]);   
            }

        }else{
            $msg = "La empresa ya existe";
            return view('registrar', ['msg' => $msg]);
        }


    }

    public function postLogin(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        
        if(Auth::attempt($credentials)){
            
            if(Auth::user()->estado == 'activo'){
            //$getUser = Usuario::where('email', $request->email);

            //Auth::login('prueba');

            return view('home');

            }else{
                $msg = "El usuario está inactivo, contacte al administrador";
                return view('login', ['msg' => $msg]);
            }

        }else{
            $msg = "El usuario no existe";
            return view('login', ['msg' => $msg]);
        }
    }

    public function getUser($email){
        $query = Usuario::where('nombre', $email)->firstOrFail();

        return $query;
    }

    public function logout(){
        Auth::logout();
    }


    //Editar Usuarios
    public function editUser(Request $request){

        $idActual = $request->id;
        $datos = Usuario::where('id', $idActual)->get();

        $getRol = DB::table('roles')->get();

        return view('admin.editUser', ['datos' => $datos, 'ActualId' => $idActual, 'roles' => $getRol]);

    }

    public function deactivateUser(Request $request){

        $idActual = $request->id;

        if($request->has('estado')){
            DB::table('usuarios_plataforma')->where('id', $idActual)->update(['estado' => 'inactivo']);
        }else{
            DB::table('usuarios_plataforma')->where('id', $idActual)->update(['estado' => 'activo']);
        }

        return redirect()->route('userAdmin');
    }

    public function postEditUser(Request $request){
        $idActual = $request->id;

        if($request->newNombre !=null){
            DB::table('usuarios_plataforma')->where('id', $idActual)->update(['nombre' => $request->newNombre]);
        }

        if($request->newApellidos !=null){
            DB::table('usuarios_plataforma')->where('id', $idActual)->update(['apellidos' => $request->newApellidos]);
        }

        if($request->newEmail !=null){
            DB::table('usuarios_plataforma')->where('id', $idActual)->update(['email' => $request->newEmail]);
        }

        if($request->newRol != 'Seleccionar'){
            DB::table('usuarios_plataforma')->where('id', $idActual)->update(['rol' => $request->newRol]);
        }

        $msgSuccess = "Usuario Actualizado";
        $datos = DB::table('usuarios_plataforma')->get();

        if(Auth::user()->rol != 'Administrador'){
            return redirect()->route('home');
        }

        return redirect()->route('userAdmin');

    }

    public function postEditCompany(Request $request){

        $idActual = $request->id;
        
        if($request->newNombre != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['nombre_empresa' => $request->newNombre]);
        }

        if($request->newRepresentante != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['representante_legal' => $request->newRepresentante]);
        }

        if($request->newServicioOProducto != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['servicio_o_producto' => $request->newServicioOProducto]);
        }

        if($request->newEmpleados != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['empleados_totales' => $request->newEmpleados]);
        }

        if($request->newResponsableInmueble != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['responsable_inmueble' => $request->newResponsableInmueble]);
        }

        if($request->newPhone1 != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['telefono1' => $request->newPhone1]);
        }

        if($request->newPhone2 != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['telefono2' => $request->newPhone2]);
        }

        if($request->newEmail != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['correo_electronico' => $request->newEmail]);
        }

        if($request->newAdress != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['direccion' => $request->newAdress]);
        }

        if($request->newFechaInicio != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['fecha_inicio_operaciones' => $request->newFechaInicio]);
        }

        if($request->newCoordenadas != null){
            DB::table('usuarios_empresa')->where('id', $idActual)->update(['coordenadas' => $request->newCoordenadas]);
        }

            $datosEmpresa = Empresa::where('id', $idActual)->get();
            return redirect()->route('userCompany');
            
    }

    public function editCompany(Request $request){
        $idActual = $request->id;
        $datosEmpresa = Empresa::where('id', $idActual)->get();

        return view('admin.editCompany', ['datosEmpresa' => $datosEmpresa, 'ActualIdEmpresa' => $idActual]);
    }
    
    public function deleteCompany(Request $request){
        $idActualForDelete = $request->id;
        $query = Empresa::where('id', $idActualForDelete)->delete();

        $idActual = $request->id;
        $datosEmpresa = Empresa::where('id', $idActual)->get();

        return view('admin.userAdmin', ['datosEmpresa' => $datosEmpresa]);
    }






    //FILES 


    public function showFiles(){

        //Pagination
        //$page = (int) $request-><

        $path = public_path('files_storage');
        $contents = File::allFiles($path);
        $bytes = File::size($path);
        //$fileName = File::basename($path);
        

        /*
        $autor = DB::table('archivos')
            ->select('autor')
            ->where('nombre_archivo', )
            */

        return view('admin.files', ['filesCollection' => $contents, 'size' => $bytes]);
    }

    public function uploadFiles(Request $request){

        if($request->has('file')){
            $file = $request->file('file');
            if($request->fileName == null){
                $name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            }else{
                $name = $request->fileName.'.'.$file->getClientOriginalExtension();
            }

            $getUser = Auth::user()->nombre;
            $query = DB::table('archivos')->insert([
                'autor'=>$getUser,
                'nombre_archivo'=>$name
            ]);
            
            $path = public_path('files_storage');
            $file->move($path, $name);

            $msgSuccess = "Se ha cargado el archivo";
            $path = public_path('files_storage');
            $contents = File::allFiles($path);
            $bytes = File::size($path);
    
            return view('admin.files', ['filesCollection' => $contents, 'size' => $bytes, 'msgSuccess' => $msgSuccess]);
            
        }else{
            $path = public_path('files_storage');
            $contents = File::allFiles($path);
            $bytes = File::size($path);
            $msg = "Por favor seleccione un archivo";
            return view('admin.files', ['filesCollection' => $contents, 'size' => $bytes, 'msg' => $msg]);
        }
    }

    public function deleteFile($path){

        unlink(public_path("files_storage/{$path}"));
        return redirect()->route('showFiles');
        //return Storage::delete(public_path("files_storage/{$path}"));

    }

    public function downloadFile($path){

        return response()->download(public_path("files_storage/{$path}"));
        //return response()->download($path);

    }


    public function GenerateDocument(Request $request){

        $idEmpresa = DB::table('usuarios_empresa')->where('nombre_empresa', $request->nombreOrazonSocial)->pluck('id');

        $dc3User = new dc3Users;

        if($request->hasFile('firmaImageInstructor')){
            $file = $request->file('firmaImageInstructor');
            $path = 'firmas_storage';
            $file->move($path, $file->getClientOriginalName());
            $dc3User->ruta_firma_instructor = $path."/".$file->getClientOriginalName();
        }

        if($request->hasFile('firmaImageRepresentanteLegal')){
            $file = $request->file('firmaImageRepresentanteLegal');
            $path = 'firmas_storage';
            $file->move($path, $file->getClientOriginalName());
            $dc3User->ruta_firma_representanteLegal = $path."/".$file->getClientOriginalName();
        }

        if($request->hasFile('firmaImageRepresentanteTrabajadores')){
            $file = $request->file('firmaImageRepresentanteTrabajadores');
            $path = 'firmas_storage';
            $file->move($path, $file->getClientOriginalName());
            $dc3User->ruta_firma_representanteTrabajadores = $path."/".$file->getClientOriginalName();
        }

        $dc3User->nombre_empleado = $request->name;
        $dc3User->clave_unica = $request->claveUnica;
        $dc3User->ocupacion = $request->ocupacion;
        $dc3User->nombre_razonSocial_empresa = $request->nombreOrazonSocial;

        $dc3User->actividad_principal_empresa = $request->actividadEmpresa;
        $dc3User->registro_federal_empresa = $request->registroFederal;
        $dc3User->registro_patronal_empresa = $request->registroPatronal;
        $dc3User->puesto = $request->puesto;

        $dc3User->nombreCurso = $request->nombreCurso;
        $dc3User->duracion_horas_curso = $request->duracionCurso;
        $dc3User->periodo_ejecucion_desde = $request->ejecucionDesde;
        $dc3User->periodo_ejecucion_hasta = $request->ejecucionHasta;
        $dc3User->area_tematica_curso = $request->areaTematicaCurso;
        $dc3User->nombre_firma_instructor = $request->nombreYFirmaCurso;
        $dc3User->nombre_firma_representanteLegal = $request->firmaRepresentanteLegal;
        $dc3User->nombre_firma_representanteTrabajadores = $request->firmaRepresentanteTrabajadores;
        $dc3User->id_empresa = $idEmpresa[0];
        $dc3User->save();


        $desde = DB::table('dc3users')->select('periodo_ejecucion_desde')->where('nombre_empleado', $request->name)->get();
        $hasta = DB::table('dc3Users')->select('periodo_ejecucion_hasta')->where('nombre_empleado', $request->name)->get();

        $rutaFirmaInstructor = dc3Users::where('nombre_empleado', $request->name)->value('ruta_firma_instructor');
        $rutaFirmaRepresentanteLegal = dc3Users::where('nombre_empleado', $request->name)->value('ruta_firma_representanteLegal');
        $rutaFirmaRepresentanteTrabajadores = dc3Users::where('nombre_empleado', $request->name)->value('ruta_firma_representanteTrabajadores');
        
        $data = array(
            'name' => $request->name,
            'claveUnica' => $request->claveUnica,
            'ocupacion' => $request->ocupacion,
            'nombreOrazonSocial' => $request->nombreOrazonSocial,
            'actividadEmpresa' => $request->actividadEmpresa,
            'registroFederal' => $request->registroFederal,
            'registroPatronal' => $request->registroPatronal,
            'puesto' => $request->puesto,
            'nombreCurso' => $request->nombreCurso,
            'duracionCurso' => $request->duracionCurso,
            'ejecucionDesde' => $request->ejecucionDesde,
            'ejecucionHasta' => $request->ejecucionHasta,
            'areaTematicaCurso' => $request->areaTematicaCurso,
            'nombreYFirmaCurso' => $request->nombreYFirmaCurso,
            'firmaRepresentanteLegal' => $request->firmaRepresentanteLegal,
            'firmaRepresentanteTrabajadores' => $request->firmaRepresentanteTrabajadores,
            //imagenes
            'imageFirmaInstructor' => $rutaFirmaInstructor,
            'imageFirmaRepresentanteLegal' => $rutaFirmaRepresentanteLegal,
            'imageFirmaRepresentanteTrabajadores' => $rutaFirmaRepresentanteTrabajadores
        );


            

        if($dc3User){
           // return view('documents.dc3Pdf', ['data' => $data]);

            view()->share('data', $data);

            
            $pdf_doc = PDF::loadView('documents.dc3Pdf', $data)->save(public_path('dc3_storage/').$request->name.'.pdf');        

            return $pdf_doc->download('pdf.pdf');
        }

        
         //return Excel::download(new UsersExport, 'tests.xls');

        //return view('admin.dc3Documents');

    }

    public function downloadPdf($path){

        return response()->download(public_path("dc3_storage/{$path}"));

    }

    public function deletePdf($path){
        unlink(public_path("dc3_storage/{$path}"));

        DB::table('dc3users')->where('nombre_empleado', str_replace('.pdf', '', $path))->delete();

        return redirect()->route('viewDc3');
    }
    
    public function viewDc3(){

        //Consultas


        $nombre_empleado = DB::table('dc3users')->select('nombre_empleado')->get();
        $nombre_empresa = DB::table('dc3users')->select('nombre_razonSocial_empresa')->get();
        $nombre_curso = DB::table('dc3users')->select('nombreCurso')->get();
        //END Consultas

        $path = public_path('dc3_storage');
        $contents = File::allFiles($path);
        $bytes = File::size($path);


        return view('admin.ViewDc3',)
            ->with('nombre_empleado', $nombre_empleado)
            ->with('nombre_empresa', $nombre_empresa)
            ->with('filesCollection', $contents)
            ->with('nombre_curso', $nombre_curso)
            ->with('size', $bytes);

    }


    public function MostrarDc3(){
        $data = Empresa::all();

        return view('admin.consultarDc3', ['data' => $data]);
    }


    public function Dc3porEmpresa(Request $solicitud){
        $getEmpresa = $solicitud->empresa;
        $Array = dc3Users::where('nombre_razonSocial_empresa', $getEmpresa)->get();

        $data = Empresa::all();

        return view('admin.consultarDc3', ['dc3Data' => $Array, 'data' => $data]);
        
    }

    
    public function generarFactura(){

        //$sql = DB::table('')

        return view('admin.generarFactura');
    }


    public function sendBill(Request $request){

//        $factura = new facturacion;

        if($request->has('file')){
            $file = $request->file('file');
            if($request->fileName == null){
                $name = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            }else{
                $name = $request->fileName.'.'.$file->getClientOriginalExtension();
            }
            
            $path = public_path('facturas_storage');
            $file->move($path, $name);

            $msgSuccess = "Se ha cargado el archivo";
            $path = public_path('facturas_storage');
            $contents = File::allFiles($path);
            $bytes = File::size($path);

                    //INSERT DB DATA

                    $query = DB::table('facturacion')->insert([
                        'dateEnd' => $request->dateEnd,
                        'filePath' => $path,
                        'nombre_empresa' => $request->nombreEmpresa,
                        'correo_deudor' => $request->correoDeudor,
                        'correo_cobrador' => $request->correoCobrador
                    ]);

            return view('admin.generarFactura', ['filesCollection' => $contents, 'size' => $bytes, 'msgSuccess' => $msgSuccess]);

            
            
        }else{
            $path = public_path('files_storage');
            $contents = File::allFiles($path);
            $bytes = File::size($path);
            $msg = "Por favor seleccione un archivo";
            return view('admin.generarFactura', ['filesCollection' => $contents, 'size' => $bytes, 'msg' => $msg]);
        }
    }


    public function getDc3Master($id){
/*
        $dc3Users = DB::table('dc3Users')
        ->join('usuarios_empresa','usuarios_empresa.id', '=', 'dc3Users.id_empresa')
        ->select('dc3users.nombre_empleado', 'dc3users.clave_unica', 'usuarios_empresa.nombre_empresa as NombreEmpresa')
        ->get();
*/
        $getCompanyId = DB::table('usuarios_empresa')->where('id', $id)->pluck('id');
        $getCompanyName = DB::table('usuarios_empresa')->where('id', $id)->pluck('nombre_empresa');

        /*
        $getUserName = DB::table('dc3Users')->where('id_empresa', $getCompanyId)->pluck('nombre_empleado');
        $getUserClave = DB::table('dc3Users')->where('id_empresa', $getCompanyId)->pluck('clave_unica');
        $getOcupacion = DB::table('dc3Users')->where('id_empresa', $getCompanyId)->pluck('ocupacion');
        */
        $getData = DB::table('dc3Users')->where('id_empresa', $getCompanyId)->select('nombre_empleado', 
        'clave_unica', 
        'ocupacion', 
        'nombre_razonSocial_empresa', 
        'actividad_principal_empresa',
        'registro_federal_empresa',
        'registro_patronal_empresa',
        'nombreCurso',
        'duracion_horas_curso',
        'periodo_ejecucion_desde',
        'periodo_ejecucion_hasta',
        'area_tematica_curso',
        'nombre_firma_instructor',
        'ruta_firma_instructor',
        'ruta_firma_representanteLegal',
        'ruta_firma_representanteTrabajadores',
        'nombre_firma_representanteLegal',
        'nombre_firma_representanteTrabajadores')->get();



        //dd($data); 
        //Share data to pdf

        view()->share('data', $getData);

            
        $pdf_doc = PDF::loadView('documents.dc3MasterPdf', $getData)->save(public_path('dc3Master_storage/').$getCompanyName[0].'.pdf');        

        return $pdf_doc->download('pdf.pdf');

    }

}
