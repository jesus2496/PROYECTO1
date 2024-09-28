@extends('layouts.plantilla')

@section('title', 'Registro')
@push('styles')
@endpush


@section('content')

    <script>
        //let contador = 1; // Inicializamos el contador en 1
        // Inicializamos el contador con el número de filas existentes más 1
        let contador = document.querySelectorAll('#inputs-container .row').length + 2;


        function agregarInput() {
            const container = document.getElementById('inputs-container');
            const inputGroup = document.createElement('div');

            inputGroup.innerHTML = `
            <div class="row">
                                <div class="">
                                    <div class="form-group mt-2">
                                            <input type="hidden" value="${contador}" class="form-control" name="articulos[${contador}][Numeracion]" placeholder="${contador}">
                                            
                                    </div>     
                                </div> 

                                <div class="col">
                                    <div class="form-group mt-2">
                                            <input type="number" class="form-control" name="articulos[${contador}][cantidad]" placeholder="Cantidad" required>
                                    </div>     
                                </div>
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control" name="articulos[${contador}][descripcionArt]" placeholder="Descripcion del articulo" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group mt-2">
                                        <input type="url" class="form-control" name="articulos[${contador}][url]" placeholder="URL">
                                    </div>
                                </div>

                        

                                <div class="col">
                                    <div class="form-group mt-2">
                                        <input type="text" class="form-control" name="articulos[${contador}][preUni]" placeholder="0.00" required>                                
                                    </div>
                                </div>

                                



                                
            </div>
            
        `;
            container.appendChild(inputGroup);
            contador++; // Incrementamos el contador
        }


        //funcion para eliminar las entradas 
        function eliminarInput() {
            const container = document.getElementById('inputs-container');
            if (container.childElementCount > 1) {
                container.removeChild(container.lastChild);
                contador--; // Decrementamos el contador
            }
        }
    </script>
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
                    @if (session('mantenimiento') === true)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('A_Serv') }}">Regresar</a>
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





    <div class="container"><!--este no afecta-->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title text-center">Solicitud de Requsición</h3>
                        <div class="container mt-2">


                        </div>
                    </div>
                    <div class="card-body">
                        <!--funcion-->
                        <form action="{{ route('MenuMantRequi') }}" method="POST">
                            @csrf


                            <div class="form-group">
                                <!-- <input type="text" name="idUsuario" class="form-control" id="nomUsuario"  placeholder="" disabled>-->

                                <input type="hidden" name="idUsuario" value="{{ $data['idUsuario'] }}">
                            </div>


                            <div class="row">
                                <div class="form-group col-6 mt-3">
                                    <input type="text" name="name" class="form-control" id="nomUsuario"
                                        placeholder="{{ $data['name'] }}" disabled>
                                    <input type="hidden" name="name" value="{{ $data['name'] }}">
                                </div>


                                <div class="form-group col-6 mt-3">
                                    <div class="form-group">
                                        <input type="text" name="departamento" class="form-control" id="departament"
                                            placeholder="{{ $data['departamento'] }}" disabled>
                                        <input type="hidden" name="departamento" value="{{ $data['departamento'] }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-6 mt-3">
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        placeholder="{{ $data['phone'] }}" disabled>
                                    <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                                </div>
                                <div class="form-group col-6 mt-3">
                                    <input type="email" name="email" class="form-control" id="correo"
                                        placeholder="{{ $data['email'] }}" disabled>
                                    <input type="hidden" name="email" value="{{ $data['email'] }}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-3">


                                        @if (session('mantenimiento'))
                                            <!--Esto es lo que se muestra-->
                                            <input type="text" name="modelo" class="form-control" id="modelo"
                                                placeholder="{{ $data['modelo'] }}" disabled>
                                            <!--esto es el valor que se manda por el formulario-->
                                            <input type="hidden" name="modelo" value="{{ $data['modelo'] }}">
                                        @else
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" class="form-control" id="modelo"
                                                placeholder="{{ $data['modelo'] }}" disabled>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mt-3">
                                        @if (session('mantenimiento'))
                                            <!--a mantenimiento lo puse en false -->
                                            <input type="text" name="descripcion" class="form-control"
                                                id="descripcion" placeholder="{{ $data['descripcion'] }}" disabled>
                                            <input type="hidden" name="descripcion" value="{{ $data['descripcion'] }}">
                                        @else
                                            <label for="">Descripcion</label>
                                            <input type="text" name="descripcion" class="form-control"
                                                id="descripcion" placeholder="{{ $data['descripcion'] }}" disabled>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div id="inputs-container">
                                <div class="row">

                                    <div class="">
                                        <div class="form-group ">
                                            <!---<label for="">No</label>-->
                                            <input type="hidden" value="1" class="form-control"
                                                name="articulos[0][Numeracion]" placeholder="1">


                                        </div>
                                    </div>



                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Cantidad</label>
                                            <input type="number" class="form-control" name="articulos[0][cantidad]"
                                                placeholder="Cantidad" required>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <input type="text" class="form-control"
                                                name="articulos[0][descripcionArt]" placeholder="Descripcion del articulo"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">URL</label>
                                            <input type="url" class="form-control" name="articulos[0][url]"
                                                placeholder="URL">
                                        </div>
                                    </div>




                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Precio/U</label>
                                            <input type="text" class="form-control" name="articulos[0][preUni]"
                                                placeholder="0.00" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="inputs-container">
                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="button" onclick="agregarInput()">Agregar Fila</button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="button" onclick="eliminarInput()">Eliminar Fila</button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Almacenar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
@endsection
