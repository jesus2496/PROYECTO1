<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="https://ayuntamientodezacatepec.gob.mx/wp-content/uploads/2021/03/redondo_zaca-300x300.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
     @stack('styles')
    <style>
        body {
           /* background-color: #70705d;  Color personalizado */

           background-color: rgb(185, 155, 115);
            
        }
        
    
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
