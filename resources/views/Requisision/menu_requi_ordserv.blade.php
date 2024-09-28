@extends('layouts.plantilla')

@section('title', 'Registro')
@push('styles')
@endpush

<style>
    .custom-btn {
        color: white;
        /* Color del texto */
        /*background-color: #007bff;  Color de fondo */
    }

    .label {
        color: white;
    }
</style>

@section('content')
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bienvenido</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('Tip_Solci') }}">Menu Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Requisision') }}">Regresar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Visualizar
                        </a>
                        <ul class="dropdown-menu">
                            @if (session('mantenimiento'))
                                <li><a class="dropdown-item" href="{{ route('VistaPDF') }}" target="_blank">Visualizar PDF Mantenimiento</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('VistaRequi') }}" target="_blank">Visualizar PDF Requisicion</a>
                                </li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('VistaRequi') }}" target="_blank">Visualizar PDF Requisicion</a>
                                </li>
                            @endif
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('CerrarSesion') }}">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>












    <div class="container mt-5">
        <div class="row mt-3">

            @if (session('mantenimiento'))
                <!--si mantenimiento es verdadero--->
                <div class="col">
                    <label class="label">paso 2 (OBLIGATORIO)</label>
                    <a href="{{ route('DescargarPDF') }}" class="btn btn-primary btn-block">Descargar PDF</a>

                </div>
                <div class="col">
                    <label class="label">paso 4 (OBLIGATORIO)</label>
                    <a href="{{ route('ReqMuestraVistaPDF') }}" class="btn btn-secondary btn-block">Descargar PDF</a>

                </div>
            @else
                <div class="col">
                    <label class="label">paso 4 (OBLIGATORIO)</label>
                    <a href="{{ route('ReqMuestraVistaPDF') }}" class="btn btn-secondary btn-block">Descargar PDF</a>

                </div>
            @endif




        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


@endsection
