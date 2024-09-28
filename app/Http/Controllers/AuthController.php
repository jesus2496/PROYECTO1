<?php

namespace App\Http\Controllers;

//para poder trabajar con los usuarios
use App\Models\User;
use App\Models\departamento;
use App\Models\mantenimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use TCPDF;
//use Illuminate\Sopport\Facedes\TCPDF;
use Barryvdh\DomPDF\Facade\Pdf;
//use Illuminate\Support\Facades\Pdf;
use Illuminate\Support\Str;

use AppHttpControllersController;
use AppProvidersRouteServiceProvider;
use Illuminate\Support\Arr;
use IlluminateFoundationAuthUser;
use IlluminateHttpRequest;
use IlluminateSupportFacadesAuth;
use IlluminateSupportFacadesHash;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AuthController extends Controller
{
    public function Registrar()
    {

        $departamento = departamento::all();
        //este index es el que esta en la carpeta views Index.blade.php
        //return $usuarios;
        //return view('Auth.RegUser');
        return view('Auth.RegUser', compact('departamento'));
    }
    //esta funcion recibe y envia al usuario
    //public function Restablecer($usuario){
    //    return view('Auth.ResetUser', ['curso' => $usuario]);
    //}

    //aqui se viene la informacion del formulario de registro 


    //la funcion store sirve para registrar un usuario
    public function store(Request $request)
    {
        $rules = [ //reglas y validaciones 
            'name' => 'required|max:255',
            'email' => 'required|unique:Usuarios,email|regex:/^[a-zA-Z0-9._%+-]+$/',
            'password' => 'required|min:5',
            'phone' => 'required|min:10|max:10',
        ];
        $messages = [ //mensajes personalizados de casa regla 
            //los campos deben estar llenos
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'phone.required' => 'El teléfono es obligatorio.',

            //email unico en la base de datos
            'email.unique' => 'Este correo ya está registrado.',
            'email.regex' => 'Error al registrar el correo',
            //direccion de correo valida
            'email.email' => 'El correo debe ser una dirección válida.',


            //campos minimos
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'phone.min' => 'El teléfono debe tener al menos 10 digitos.',
            'phone.max' => 'El teléfono debe tener como maximo 10 digitos.',

        ];

        $validatedData = $request->validate($rules, $messages);

        $email = $request->email."@ayuntamientodezacatepec.gob.mx";

        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'telefono' => $request->phone,
            'departamento' => $request->departamento,
            'password' => Hash::make($request->password),
        ]);
        //$usuario = new User();
        //$usuario->name = $request->name;
        //$usuario->idUsuario = $user->idUsuario;
        //crea una sesion al usuario ya creado
        Auth::login($user);

        return redirect()->route('Tip_Solci', compact('user'));
        //return view('menu', compact('user'));
        //return redirect()->route('A_Serv',compact('usuario'));
        //return redirect()->route('A_Serv',compact('usuario'));
    }



    public function menu()
    {

        session(['mantenimiento' => false]);

        // Comprobamos si el usuario ya está logeado
        if (Auth::check()) {
            // Verificamos que el usuario autenticado es el mismo que el usuario solicitado
            $usuario=Auth::user();
            //extraemos los datos uno tras otro
            $idUsuario=$usuario->idUsuario;
            $name=$usuario->name;
            $departamento=$usuario->departamento;
            $phone=$usuario->telefono;
            $email=$usuario->email;

            $dataEmp=[

                'idUsuario' => $idUsuario,
                'name' => $name,
                'departamento' => $departamento,
                'phone' => $phone,
                'email' => $email,
            ];

            //esta es la variable se sesion dataEmp
            session(['dataEmp' => $dataEmp]);
                return view('Auth.menu', compact('dataEmp'));
            
        }
        // Si no está logado le mostramos la vista con el formulario de login
        return redirect()->route('principal');
    }
    

    //este es el donde se llena la descripcion y el modelo con los datos llenos 
    public function servicio()
    {
        $user = session('dataEmp');
        //comprobacion si el usuario ya esta logueado
        if (Auth::check()) {
                //dd($user);
                //este es la vista que llena la orden de servicio
                return view('Ord_servicios.OrdenServicio', compact('user'));
            
            
        }else{
            //si no esta logueado lo mandamos a la vista del formulario
                return redirect()->route('principal');

        }
        
        
    }


    //funcion para iniciar sesion recibe por POST
    public function IniciarSesion(Request $request)
    {
        $rules = [ //reglas y validaciones
             //agrege esto nuevo regex:/^[a-zA-Z0-9._%+-]+$/
            'email' => 'required',
            'password' => 'required|min:5',
        ];

        $messages = [ //mensajes personalizados de casa regla 
            //los campos deben estar llenos
            'email.required' => 'El nombre es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min'=>'La contraseña debe tener 8 caracteres como minimo',
        ];

        $validatedData = $request->validate($rules, $messages);
        //creamos una variable email que le asignamos lo que tiene 
        //el formulario unidad.informatica y le contatenamos @ayuntamientodezacatepec.gob.mx

        //unidad.informatica@ayuntamientodezacatepec.gob.mx
        $email = $request->email."@ayuntamientodezacatepec.gob.mx";
        

        $credencial = $request->only('email', 'password');

        // Actualiza el valor de 'email' en el array $credencial
        $credencial['email'] = $email;


        // Verificar si el correo electrónico existe
        $user = User::where('email', $email)->first();

        

        //dd($credencial);
        if ($user) {
            // Verificar si la contraseña es correcta
            if (Auth::attempt($credencial)) {
                //aqui estamos obteniendo los datos de el usuario
                

                if($user->email==='unidad.informatica@ayuntamientodezacatepec.gob.mx'){
                    


                    //creamos una variable administrador
                    //Creamos una variable que ferifique si es administrador o no 
                    session(['administrador' => true]);
                }else{

                    session(['administrador' => false]);
                }


                // Redirigir a la vista con el objeto usuario
                return redirect()->route('Tip_Solci');
                //Tipo_Solci = funcion menu AuthController
            } else {
                // Si la contraseña es incorrecta
                return redirect()->route('principal')->withErrors(['password' => 'La contraseña es incorrecta.']);
            }
        } else {
            // Si el correo electrónico no existe
            return redirect()->route('principal')->withErrors(['email' => 'El correo electrónico no está registrado.']);
        }
    } //fin del metodo




    //funcion que muestra el formulario de restablecer contraseña
    public function Restablecer()
    {
        return view('Auth.Reset');
    }

   
    //Genero y envío el enlace para restaurar la clave
    public function enlace(Request $request)
    {
        /*Validación de email
        $request->validate([
            'email' => 'required|email|exists:Usuarios',
        ]);*/

        $rules = [ //reglas y validaciones
            'email' => 'required|email|exists:Usuarios',
        ];

        $messages = [ //mensajes personalizados de casa regla 
            //los campos deben estar llenos
            'email.required' => 'El nombre es obligatorio.',
            'email.email' => 'El correo no es permitido',
            'email.exists' => 'El correo debe ser @gmail.com',
        ];

        $validatedData = $request->validate($rules, $messages);



        //Generación de token y almacenado en la tabla password_resets
        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        //Envío de email al usuario
        Mail::send('email.email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Cambiar contraseña en CMS Laravel');
        });

        //Retorno return redirect()->route('principal')
        return redirect()->route('principal')->with('success','Te hemos enviado un email a <strong>'.$request->email.'</strong> con un enlace para realizar el cambio de contraseña.');

    }





    //Muestro el formulario para cambiar la clave
    public function clave($token)
    {
        return view('Auth.clave', ['token' => $token]);
    }

    //cambio la clave
    public function cambiar(Request $request)
    {
        //Valido datos
        $request->validate([
            'email' => 'required|email|exists:Usuarios',
            'password' => 'required|min:5|max:16|confirmed',
            'password_confirmation' => 'required'
        ]);

        //Compruebo token válido
        $comprobarToken = DB::table('password_reset_tokens')->where(['email' => $request->email, 'token' => $request->token])->first();
        if(!$comprobarToken){
            return back()->withInput()->with('danger','El enlace no es válido');
        }

        //Actualizo password
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        //Borro token para que no se pueda volver a usar
        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        //Retorno return redirect()->route('principal')
        return redirect()->route('principal')->with('success','La contraseña se ha cambiado correctamente.');
    }


    public function RecibeInfoParaVistaPDF(Request $request){
            $mantenimiento = session('mantenimiento');

            $mantenimiento = true;
            session(['mantenimiento' => $mantenimiento]);


        /* idUsuario name departamento phone email modelo descripcion*/
            $fechaHoy = now()->toDateString(); // Formato: 'YYYY-MM-DD'
            

            //$idFolio = "XXXX";
            $data = $request->only(['idUsuario','name','departamento','phone'
                                    ,'email','modelo','descripcion' ,'verSiHayMantenimiento']);
            //dd($data);
            $data['fecha'] = $fechaHoy;
            //$data['idFolio']=$idFolio;

            // La casilla está seleccionada para requisicion
        if ($request->has('flexCheckDefault')) {
            
            // Realiza las acciones necesarias
            //dd($data); //sirve para ver los objetos que tiene la variable $data 
            //return view('Requisision.requisision',compact('data'));
            //return redirect()->route('Requisision',['data'=> serialize($data)]);
            session(['data' => $data]);
            return redirect()->route('Requisision');
        } else {
            // La casilla no está seleccionada
            // Realiza otras acciones si es necesario
            //return redirect()->route('Ord_servicios.ordenPDF', compact('data'));
            session(['data' => $data]);
            return view('Ord_servicios.ordenPDF', compact('data')); 
        }  

    }

        //muesta el pff
        public function MuestraVistaPDF(Request $data){

            $horaActual = now()->toTimeString(); // Formato: 'HH:MM:SS'

            if ($data->isMethod('post')) {
                // Procesar la solicitud
                
                $mantenimiento= mantenimiento::create([
                    'user_id'=>$data->idUsuario,
                    'modelo' =>$data->modelo,
                    'fecha'=>$data->fecha,
                    'hora'=>$horaActual,
                    'descripcion' => $data->descripcion,
                ]);
                $idFolio=$mantenimiento->idFolio;
    
                $data['idFolio']=$idFolio;
    
                //$data = json_decode($data,true);
                $pdf=Pdf::loadView('Ord_servicios.PDF',compact('data'));
                //return $pdf->stream();
                return $pdf->download('Ord_servicios.pdf');

            } else {
             return response()->json(['error' => 'Método no permitido'], 405);
            }
        }


        public function Principal()
        {

            //comprobacion si el usuario ya esta logueado
        if (Auth::check()) {
                $user = Auth::user();
                return redirect()->route('Tip_Solci', compact('user'));
                //return view('Ord_servicios.OrdenServicio', compact('user'));
            
        }
        }


        



    


}
