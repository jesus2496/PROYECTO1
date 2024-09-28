<?php

namespace Database\Seeders;
use App\Models\departamento;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $usuario = new departamento();
        $usuario2 = new departamento();
        $usuario3 = new departamento();
        $usuario4 = new departamento();
        $usuario5 = new departamento();
        $usuario6 = new departamento();
        /*
        Rrecursos humanos
        Bienestar
        Documento ricoHisto
        Sistemas
        Contraloria
        Visas
        */



      //$usuario-> idUsuario="1"; no es necesario ya que es automaticamente
        $usuario -> nombre="Recursos Humanos";

        $usuario2 -> nombre="Bienestar";

        $usuario3 -> nombre="Documento Historico";

        $usuario4 -> nombre="Sistemas";

        $usuario5 -> nombre="Contraloria";

        $usuario6 -> nombre="Visas";


        $usuario  -> save();
        $usuario2 -> save();
        $usuario3 -> save();
        $usuario4 -> save();
        $usuario5 -> save();
        $usuario6 -> save();

    }
}
