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
                        <a class="nav-link active" aria-current="page" href="#">Menu Principal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('A_Serv') }}">Solicitud de Servicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Requisision') }}">Solicitud de Requisiciones</a>
                    </li>
                    @if (session('administrador'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('AdminMant') }}">Administrador</a>
                        </li>
                    @else
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('CerrarSesion') }}">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>






                <h4 style="font-size: 30px">{{ $dataEmp['name'] }}</h4>
            



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>@endsection
