<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\mantenimiento;
use Illuminate\Support\Facades\Auth;
use App\Models\requisicion;
use Barryvdh\DomPDF\Facade\Pdf;
class RequisicionController extends Controller
{
    /*
    protected $fillable =[
        'user_id',
        'id_folio',
        //el idReq no es necesario por que se agrega automaticamente
        'cantidad',
        'descArt',
        'preUnit',
    ];
    */
    public function Requisicion(){
        $data = session('data');
        //$fecha = Carbon::now()->format('d-m-Y');
        $fecha = now()->toDateString();
        if (Auth::check()) {
            // El usuario está autenticado
            $user = Auth::user();

            $idUsuario = $user->idUsuario;
            $name = $user->name;
            $departamento = $user->departamento;
            $phone = $user->telefono;
            $email = $user->email;

            if(session('mantenimiento')){
                $modelo = $data['modelo'];
                $descripcion = $data['descripcion'];
            }else{
                $modelo ="";
                $descripcion="";
            }



            

            $data = [
                'idUsuario' => $idUsuario,
                'name' => $name,
                'departamento' => $departamento,
                'phone' => $phone,
                'email' => $email,
                'fecha' => $fecha,
                'modelo' => $modelo,
                'descripcion' => $descripcion,
            ];




            //dd($data);
            //$data = unserialize($data);
            //$fecha = Carbon::now()->format('d-m-Y');
            $fecha = now()->toDateString();
                //$idFolio = "XXXX";
                
            

            session(['data' => $data]);
            //session()->forget('data');
            return view('Requisision.requisision',compact('data'));










            // Puedes acceder a los datos del usuario aquí
        } else {
            // El usuario no está autenticado


            return redirect()->route('principal');
        }

    }

    
    //funcion que muestra un menu mantenimiento PDF-Visualizar 
                                //Requisicion   PDF-Visualizar
    public function MenuMantRequi(Request $request){
        
        $data = session('data');
        $fechaHoy = now()->toDateString(); // Formato: 'YYYY-MM-DD'
        // Modifica el valor de 'descripcion' y modelo
        $data['descripcion'] = $request->descripcion;
        $data['modelo'] = $request->modelo;
        $data['cantidad'] = $request->cantidad;
        $data['fecha']=$fechaHoy;
        //volvemos a actualizar la sesion con los nuevos datos 
        session(['data'=>$data]);


        $articulos = $request->input('articulos');
        session(['articulos' => $articulos]);
        //dd($articulos);
        
        return view('Requisision.menu_requi_ordserv');
    }

    public function VistaPDFM(){
        //validamos que este logueado 
        //y como esta logueado entonces lo mandamos a la vista
        if(Auth::check()){
            $data = session('data');
                    return view('Requisision.requisisionvista',compact('data'));
        }else{
            return redirect() ->route('principal');
        }
        
    }
    public function DescargarPDFM(){

        $data = session('data');
        $horaActual = now()->toTimeString(); // Formato: 'HH:MM:SS'

        $mantenimiento= mantenimiento::create([
            'user_id'=>$data['idUsuario'],
            'modelo' =>$data['modelo'],
            'fecha'=>$data['fecha'],
            'hora'=>$horaActual,
            'descripcion' => $data['descripcion'],
        ]);
        $idFolio=$mantenimiento->idFolio;

        $data['idFolio']=$idFolio;
        //volvi a sobre escribir la sesion
        session(['data' => $data]);
        //$data = json_decode($data,true);
        $pdf=PDF::loadView('Ord_servicios.PDF',compact('data'));
        //return $pdf->stream();
        return $pdf->download('Index.pdf');

    }


    public function VistaPDFReq(){

        if(Auth::check()){
            $data = session('data');
        $articulos = session('articulos');
        return view('Requisision.VistaRequisisionREQ',compact('data','articulos'));
        }else{
            return redirect()->route('principal');
        }
        

    }

    public function DescargarPDFRequi(){
        $articulos = session('articulos');

        /*esto crea una nueva solicitud de mantenimiento se debe de crear ahorita por que una requisicion
        depende de una solicitud de mantenimiento */
        $data = session('data');
        
        /* el if lo hice para verificar que se agrege un idFolio a la tabla requisicion */
        if(session('mantenimiento')){
            if($articulos){
                foreach($articulos as $articulo){
                    
                    $importe ="12";
                    requisicion::create([
                        'user_id'=>$data['idUsuario'],
                        'id_folio' => $data['idFolio'],
                        'cantidad' => $articulo['cantidad'],
                        'descArt' => $articulo['descripcionArt'],
                        'preUnit' => $articulo['preUni'],
                        'importe' => $articulo['preUni']*$articulo['cantidad'],
                        'url' => $articulo['url'],
    
    
                    ]);
                }
            }
        }else{

            if($articulos){
                foreach($articulos as $articulo){
                    
                    $importe ="12";
                    requisicion::create([
                        'user_id'=>$data['idUsuario'],
                        'cantidad' => $articulo['cantidad'],
                        'descArt' => $articulo['descripcionArt'],
                        'preUnit' => $articulo['preUni'],
                        'importe' => $articulo['preUni']*$articulo['cantidad'],
                        'url' => $articulo['url'],
    
    
                    ]);
                }
            }

        }
        

        $pdfRequ=PDF::loadView('Requisision.VistaRequisisionREQPDF',compact('data','articulos'));
        //return $pdf->stream();
        session(['mantenimiento' => true]);
        return $pdfRequ->download('VistaRequisisionREQPDF.pdf');
        
    }
    
}
