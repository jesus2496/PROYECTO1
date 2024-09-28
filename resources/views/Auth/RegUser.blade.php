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
                    <h3 class="card-title text-center">Registrar</h3>
                    <a href="{{ route('principal') }}" class="btn btn-link mt-3">¿Ya tienes cuenta?</a>

                </div>
                <div class="card-body">
                                            <!--funcion-->
                    <form action="{{route('almacenar')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nomUsuario">Nombre:</label>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name"  placeholder="Nombre Completo">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        

                        <div class="form-group mt-3">
                            <div class="form-group">
                                <label for="departamento">Elige un Departamento</label>
                                <select class="form-control" id="departamento" name="departamento">
                                    @foreach ($departamento as $dep)
                                        <option value="{{ $dep->nombre }}">{{ $dep->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                        </div>


                        <div class="form-group mt-3">
                            <label for="phone">Teléfono:</label>
                            <input type="number" name="phone" value="{{old('phone')}}" class="form-control" id="phone" placeholder="Ingresa tu número de teléfono">
                            @error('phone')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group mt-3">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" id="password"  placeholder="Ingrese su contraseña">
                            @error('password')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label class="col" >Correo:</label> 
                        </div>
                           
                        <div class="input-group">
                            <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Ingrese el correo electronico" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                   <span class="input-group-text" id="basic-addon2">@ayuntamientodezacatepec.gob.mx</span>
                                
                        </div>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror




                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
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

