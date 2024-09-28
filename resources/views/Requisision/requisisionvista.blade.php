@extends('layouts.plantilla')

@section('title','Registro')
<style>
.container {
  width: 800px; /* Ajusta el ancho según sea necesario */
  margin: auto;
  border: 1px solid black; /* Opcional: para visualizar el contenedor */
  padding: 20px; /* Opcional: para añadir espacio alrededor del contenido */+
  background-color: rgb:
}

table {
  width: 100%;
  border-collapse: collapse;
  margin: 1px; /* Ajusta el margen según sea necesario */
}

table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 25px; /* Ajusta el relleno según sea necesario */
}
</style>








@section('content')

<div class="container" style="background-color: white;">
  <img style="position: relative" src="assets/logo.png" alt="" width="120px" height="50px">
  <h2 style="text-align: center">Honorable Ayuntamiento de Zacatepec</h2>
  <h2 style="text-align: center">Morelos 2022-2024</h2>
  <h4 style="text-align: center">Orden Solicitud Servicio</h4>
  <br><br>

  <table>
    <tr>
      <th>Número de orden de servicio:</th>
      <td>En Espera</td>
    </tr>
    <tr>
      <th>Fecha de emisión de la orden de servicio:</th>
      <td>{{ $data['fecha'] }}</td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td>{{ $data['name'] }}</td>
    </tr>
    <tr>
      <th>Datos del solicitante:</th>
      <td>Teléfono: {{ $data['phone'] }}<br>E-mail: {{ $data['email'] }}<br>Departamento: {{ $data['departamento'] }}<br>Modelo: {{ $data['modelo'] }}</td>
    </tr>
    <tr>
      <th>Descripción completa del servicio a prestar:</th>
      <td>{{ $data['descripcion'] }}</td>
    </tr>
    <tr>
      <th>Equipo responsable:</th>
      <td>Ing. Victor Hugo Rangel Salinas</td>
    </tr>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
@endsection
