@extends('layouts.plantilla')

@section('title', 'Solicitudes de Mantenimiento')
@push('styles')
    <style>
        .contenedor {
            margin: 10px;
            /* Ajusta este valor según tus necesidades */
            max-height: 400px;
            /* Ajusta esta altura según tus necesidades */
            overflow-y: auto;
            /* Esto habilita el scroll vertical */
            padding: 0px;
            /* Espacio interno del contenedor */
            border: 1px solid #ccc;
            Borde del contenedor */ background-color: #70705d;
            /* Color de fondo del contenedor */
        }

        .contenedor2 {
            margin: 10px;
            /* Ajusta este valor según tus necesidades */
            max-height: 400px;
            /* Ajusta esta altura según tus necesidades */

            /*border: 1px solid #ccc;  Borde del contenedor;*/
            background-color: #70705d;
            /* Color de fondo del contenedor */
        }



        thead th {
            position: sticky;
            top: 0;
            background-color: #343a40;
            /* Color de fondo de la cabecera */
            color: white;
            /* Color del texto de la cabecera */
            z-index: 1;
        }
    </style>
@endpush



@section('content')<!---esto es el bodi-->
    <h1 style="text-align: center;">ADMINISTRADOR SOLICITUDES DE MANTENIMIENTO</h1>
    <br>



    <div class="contenedor2">
        <div class="row">
            <div class="col-6">
                <a class="" href="{{ route('Principal') }}">Regresar</a>
                <h5>Solicitudes de Mantenimiento: {{ $fechaHoy = now()->toDateString() }}</h5>
            </div>
            <div class="col-6">
                <form action="{{ route('AdminMant') }}" method="get">
                    <div class="row">
                        <div class="col">
                            <input type="date" class="form-control" name="fecha" id="">
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-info">Consultar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>


    <div class="row">
        <div class="col-6">

            <div class="contenedor">


                <!--obtenemos la fecha // Formato: 'YYYY-MM-DD'-->


                <table class="table table-dark table-striped-columns">
                    <thead>
                        <tr>
                            <th>HORA</th>
                            <th>DESCRIPCION DEL PROBLEMA</th>
                            <th>DEPARTAMENTO</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mantenimientos as $mantenimiento)
                            <tr>
                                <td>{{ $mantenimiento->hora }}</td>
                                <td>{{ $mantenimiento->descripcion }}</td>
                                <td>{{ $mantenimiento->usuario->departamento }}</td>
                                <td><a class="btn btn-info" href="{{ route('AdminMantUnico', $mantenimiento->idFolio) }}"
                                        target="_blank">
                                        <img style="position: relative" src="assets/red-eye.ico" alt=""
                                            width="25px" height="25px">
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--esta ruta esta en AuthController-->

            </div><!---fin de clase contenedor-->

        </div><!--fin del col-6-->

        <div class="col-6">
            <div class="contenedor">
                <table class="table table-dark table-striped-columns">
                    <thead>
                        <tr>
                            <th>HORA</th>
                            <th>DESCRIPCION DEL PROBLEMA</th>
                            <th>DEPARTAMENTO</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mantenimientoPorDia as $diaEspecificos)
                            <tr>
                                <td>{{ $diaEspecificos->hora }}</td>
                                <td>{{ $diaEspecificos->descripcion }}</td>
                                <td>{{ $diaEspecificos->usuario->departamento }}</td>
                                <td><a class="btn btn-info" href="{{ route('AdminMantUnico', $diaEspecificos->idFolio) }}"
                                        target="_blank">
                                        <img style="position: relative" src="assets/red-eye.ico" alt=""
                                            width="25px" height="25px">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


    </div><!--fin d ela fila-->





@endsection
