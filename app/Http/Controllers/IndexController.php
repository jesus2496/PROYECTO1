<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//para poder trabajar con los usuarios
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        
        return view('Index');
    }
}
