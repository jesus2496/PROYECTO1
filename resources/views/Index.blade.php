<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ayuntamiento</title>
</head>
<body style="background-color: brown">
    <div class="container"><!--este no afecta-->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title text-center">H. Ayuntamiento de Zacatepec</h3>
                    </div>
                    <div class="card-body">
                        <!--en el action va l nombre que le puse al controlador-->
                        <form action="{{ route('validar') }}" method="POST">
                            @csrf
                            <label for="">Correo</label>
                            <div class="input-group">
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Ingrese el correo electronico" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">@ayuntamientodezacatepec.gob.mx</span>
                                <br>
                                @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
    
    
    
                            <div class="form-group mt-3">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="ingrese la contraseña">
                                @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
    
    
                            <div class="row mt-3">
    
                                 <button type="submit" class="btn btn-success btn-block">Iniciar Sesión</button>
    
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                <a href="{{route('restablecer')}}" class="btn btn-link mt-3">¿Has olvidado tu contraseña?</a>
                                </div>
                                <div class="col">
                                <a href="{{route('registrar')}}" class="btn btn-link mt-3">¿No tienes una cuenta?</a>
                                </div>
    
                            </div>
                            <br>
                           
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    
</body>
</html>









