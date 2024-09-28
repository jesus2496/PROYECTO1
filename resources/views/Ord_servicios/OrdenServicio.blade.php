@extends('layouts.plantilla')

@section('title','Registro')
@push('styles')

@endpush


@section('content')

<div class="container"><!--este no afecta-->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title text-center">Solicitud de Servicios</h3>
                    <div class="container mt-2">
                        <div class="row">
                            <!--<div class="col-12 d-flex justify-content-end align-items-center">
                                
                                
                                
                            </div>-->
                            <a href="{{ route('Tip_Solci')}}" class="">Regresar</a> <br>



                        </div>

                    </div>
                </div>
                <div class="card-body">
                                            <!--funcion-->
                    <form action="{{route('RecibeInfoParaVistaPDF')}}" method="GET">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="idUsuario" value="{{$user['idUsuario']}}">
                            
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="name" class="form-control" id="nomUsuario"  placeholder="{{$user['name']}}" disabled>
                            <input type="hidden" name="name" value="{{{$user['name']}}}">
                        </div>
                        

                        <div class="form-group">
                            <div class="form-group mt-3">
                                <input type="text" name="departamento" class="form-control" id="departament"  placeholder="{{$user['departamento']}}" disabled>
                                <input type="hidden" name="departamento" value="{{$user['departamento']}}">
                            </div>                            
                        </div>


                        <div class="form-group mt-3">
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{$user['phone']}}" disabled>
                            <input type="hidden" name="phone" value="{{$user['phone']}}">
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" name="email" class="form-control" id="correo" placeholder="{{$user['email']}}" disabled>
                            <input type="hidden" name="email" value="{{$user['email']}}">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Modelo"  required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion detallada" required ></textarea>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" name="flexCheckDefault" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Requisicion
                            </label>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Siguiente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
@endsection