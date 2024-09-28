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
                            <div class="col-12 d-flex justify-content-end align-items-center">
                               
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                                            <!--funcion-->
                                            <form method="POST" action="{{ route('cambiar') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="token" value="{{ $token }}">
                                                </div>
                                                <div class="form-group">
                                                <label for="email">Correo</label>
                                                <input id="email" placeholder="introduce el correo" class="form-control" type="text" name="email" value="" required autofocus>
                                                  
                                                    @error("email")
                                                    <span class="red-text text-darken-1">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="password">Contraseña</label>
                                                    <input class="form-control" placeholder="introduce la contraseña" id="password" type="password" name="password" value="" required>
                                                        
                                                        @error("password")
                                                        <span class="red-text text-darken-1">{{ $message }}</span>
                                                        @enderror

                                                </div>

                                                    <div class="form-group mt-3">
                                                        <label for="password-confirm">Repetir contraseña</label>
                                                        <input class="form-control" placeholder="repite la contraseña" id="password-confirm" type="password" name="password_confirmation" value="" required>
                                                        
                                                        @error("password_confirmation")
                                                        <span class="red-text text-darken-1">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="form-group mt-3">
                                                        <button class="btn btn-primary btn-block" type="submit">Cambiar contraseña
                                                           
                                                        </button>
                                                    </div>


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
