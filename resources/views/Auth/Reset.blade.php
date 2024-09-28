@extends('layouts.plantilla')

@section('title','Home')
@push('styles')
<style>
    body {
        background-color: #d8c6b1; /* Color personalizado */
    }
</style>
@endpush

@section('content')
<main class="login-form c">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">Recuperar Contraseña</div>
                    <div class="card-body">
                        <form action="{{ route('enlace') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Tu Email</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{old('email')}}" id="email_address" class="form-control" name="email"
                                        required autofocus placeholder="Introduzca su correo electronico">
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Enviar Email de recuperación
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

