<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\mantenimiento;
use Illuminate\Support\Facades\Auth;

class AdminmantenimientoController extends Controller
{
    //

    public function AdminMant(Request $request){

        if(Auth::check()){//primero verificamos que el usuario admin este logueado

                if(session('administrador')){//comprobamos que sea administrador 
                    //muestra todos los registros sin excepciones
                //$mantenimientos = Mantenimiento::with('usuario')->get();
                //obtiene la fecha de hoy 
                $fechaHoy = now()->toDateString(); // Formato: 'YYYY-MM-DD'
                $mantenimientos = Mantenimiento::with('usuario')
                    ->whereDate('fecha', $fechaHoy)
                    ->orderBy('hora', 'desc') // Orden ascendente por hora
                    ->get();
                //dd($mantenimientos);
                $prueba='2024-09-23';

                /**ahora obtenemos la fecha*/
                $diaEspecifico = $request->input('fecha',$prueba); //en caso de que el request no encuentre un valor 
                                                                    //se usara la fecha de hoy en su lugar
                
                
                //ahora aremos la consulta 
                $mantenimientoPorDia = mantenimiento::with('usuario')
                    ->whereDate('fecha',$diaEspecifico)
                    -> orderBy('hora','desc')->get();
                return view('Admin.AdminMantenimiento',compact('mantenimientos','mantenimientoPorDia'));
                }else{
                    return redirect()->route('principal');
                }
                
        }else{
            return redirect()->route('principal');
        }
        
    }


    public function AdminMantUnico($id){

        if(Auth::check()){//verificamos que haya logueado correctamente
            if(session('administrador')){//verificamos que se haya logueado como Administrador
                $mantenimiento = Mantenimiento::with('usuario')->findOrFail($id);

                $pdf=PDF::loadView('Admin.AdminMantenimientoVistaUno',compact('mantenimiento'));
                return $pdf->stream();
            }else{
                return redirect()->route('principal');
            }

        }else{
            return redirect()->route('principal');
        }

        


        //return view('Admin.AdminMantenimientoVistaUno', compact('mantenimiento'));
    }
}
