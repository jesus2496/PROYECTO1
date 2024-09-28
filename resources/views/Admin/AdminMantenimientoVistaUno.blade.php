<!DOCTYPE html>
<html>

<head>
    <title>Orden de Servicio</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1px;
            /* Ajusta el margen según sea necesario */
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 25px;
            /* Ajusta el relleno según sea necesario */
        }
    </style>

</head>

<body>
    <br>
    <!--top= pixeles en y-->
    <!--left= pixeles en x-->
    <!--ancho       alto-->
    <img style="position: relative" src="assets/logo.png" alt="" width="120px" height="50px">

    <h2 style="position: relative; top:-40px; left: 150px;"> Honorable Ayuntamiento de Zacatepec</h2>

    <h2 style="position: relative; top:-39px; left: 240px;">Morelos 2022-2024</h2>

    <h4 style="position: relative; top 20; left: 190;">Orden Solicitud Servicio</h4>

    <br><br>
    <table>
        <tr>
            <th>Número de orden de servicio:</th>
            <td>{{ $mantenimiento->idFolio }}</td>
        </tr>
        <tr>
            <th>Fecha de emisión de la orden de servicio:</th>
            <td>{{ $mantenimiento->fecha }}</td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td>{{ $mantenimiento->usuario->name }}</td>
        </tr>
        <tr>
            <th>Datos del solicitante:</th>
            <td>Telefono: {{ $mantenimiento->usuario->telefono }}<br>E-mail: {{ $mantenimiento->usuario->email }}
                <br>Departamento: {{ $mantenimiento->usuario->departamento }}
                <br>Modelo: {{ $mantenimiento->modelo }}
            </td>
        </tr>
        <tr>
            <th>Descripción completa del servicio a prestar:</th>
            <td>{{ $mantenimiento->descripcion }}</td>
        </tr>
        <tr>
            <th>Equipo responsable:</th>
            <td>Ing. Victor Hugo Rangel Salinas</td>
        </tr>
    </table>


    <p style="position: relative; text-align: center; top: 120px; right: 150px;">_______________________________ <br>
        Ing. Victor Hugo Rangel Salinas</p>

    <p style="position: relative; text-align: center; top: 68px; left: 150px;">_______________________________ <br>
        {{ $mantenimiento->usuario->name }}</p>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
