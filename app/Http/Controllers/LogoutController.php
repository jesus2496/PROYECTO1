<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function destroy(Request $request) {
      // Invoca el método logout de la fachada Auth para cerrar la sesión del usuario actualmente autenticado
      Auth::logout();
  
      // Invalida la sesión actual. Esto significa que todos los datos almacenados en la sesión se eliminan
      $request->session()->invalidate();
  
      // Regenera el token de sesión. Esto es una medida de seguridad adicional para prevenir ataques de fijación de sesión
      $request->session()->regenerateToken();
  
      // Redirige a la página de inicio o de login una vez que se ha eliminado cualquier información del usuario
      return redirect()->route('principal');
  }
  
}
