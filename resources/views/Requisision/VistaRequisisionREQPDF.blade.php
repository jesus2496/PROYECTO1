<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con Filas Fusionadas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rasa:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">

<style>
        table, th, td {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #ffffff;
            font-size: 13px;
        }
        #Centrar {
            
            text-align: center;
            font-size: 13px;
        }

        .url-text {
          font-family: "Rasa", serif;
          font-optical-sizing: auto;
        }
        .container {
        width: auto; /* Ajusta el ancho según sea necesario */
        /*margin: auto;*/
        /*border: 1px solid black; /* Opcional: para visualizar el contenedor */
        padding: 20px; /* Opcional: para añadir espacio alrededor del contenido */
        background-color: #ffffff;
        }


.table {
    /*width: 100%;*/
    table-layout: fixed;
  }

  .table td {
    word-wrap: break-word;
  }




  /* Ajustar anchos de columnas */
  .col-no {
    width: 5%;
  }

  .col-cantidad {
    width: 15%;
  }

  .col-descripcion {
    width: 50%;
  }

  .col-precio {
    width: 15%;
  }

  .col-importe {
    width: 20%;
  }

  .col-logo{
    width: 50%;
  }
  .Espacio1{
    width: 250%;
  }
  .UNID{
    width: 50%;
  }
  /*concepto del gasto */
  .ConC{
    width: 330%;
  }
  /*colsubtotal2 - colvacio - total*/
  .col2{
    width:70%;

  }


    </style>
</head>
  <body>
    
  <div class="container" >
    <table>
      <tr><!--son filas-->
            <!--ancho      alto-->
          <td id="Centrar" class="col-logo" rowspan="2">
            <img style="position: relative" src="assets/logo.png" alt="" width="120px" height="50px">
          </td>
          
          <td id="Centrar" width="500" height="20">H. AYUNTAMIENTO DE ZACATEPEC MORELOS 2022-2024</td>
      </tr>
      <tr>
          <td id="Centrar" width="500" height="20">REQUISICIÓN</td>
      </tr>

      
  </table>
  <table>
    <tr>
          <!--ancho-->
        <td width="1003" height="10"></td>
    </tr>
  </table>

  <table>
    <tr>
        <td class="Espacio1" style="font-size: 13px;" rowspan="2"></td>
        <td width="100"  style="font-size: 13px;" >HOJA</td>
        <td width="100" ></td>
        <td id="Centrar" style="font-size: 13px;"  width="120" >1 DE 1</td>
        <td width="150"  id="Centrar" style="font-size: 13px; background-color: rgb(185, 185, 185); ">FECHA</td>
        
        
    </tr>
    <tr>
      <td colspan="3"></td>
      <td id="Centrar" style="font-size: 13px;">{{$data['fecha']}}</td>
    </tr>
</table>

<table>
    <tr>
      <td class="UNID" style="font-size: 13px;">UNID. RESPONSABLE DEL GASTO:</td>
      <td></td>
    </tr>
    <tr>
      <td class="UNID">FUENTE DE FINANCIAMIENTO:</td>
      <td  style="text-align: right; font-size: 13px;">(Exclusivo tesorería)</td>
    </tr>

    <tr>
      <td class="UNID">PARTIDA PRESUPUESTAL:</td>
      <td style="text-align: right; font-size: 13px;">(Exclusivo tesorería)</td>
    </tr>
    <tr>
      <td height="10" colspan="2">
        <!--estacio vacio necesario--->
      </td>
    </tr>
</table>

<table class="table">
  <tr>
    <td id="Centrar" class="col-no" style="font-size: 13px; background-color: rgb(185, 185, 185)">No</td>
    <td id="Centrar" class="col-cantidad" style="font-size: 13px; background-color: rgb(185, 185, 185)">CANTIDAD</td>
    <td id="Centrar" class="col-descripcion" style="font-size: 13px; background-color: rgb(185, 185, 185)">DESCRIPCION DEL ARTICULO</td>
    <td id="Centrar" class="col-precio" style="font-size: 13px; background-color: rgb(185, 185, 185)">PRECIO/U</td>
    <td id="Centrar" class="col-importe" style="font-size: 13px; background-color: rgb(185, 185, 185)">IMPORTE</td>
  </tr>

  @php
    $sub = 0;
    $subTOTAL = 0;
  @endphp
  @if($articulos)
    @foreach ($articulos as $articulo)
      <tr>
        <td id="Centrar" class="col-no">{{ $articulo['Numeracion'] ?? '' }}</td>
        <td id="Centrar" class="col-cantidad">{{ $articulo['cantidad'] ?? '' }}</td>
        <td id="Centrar" class="col-descripcion" style="font-size: 13px">{{ $articulo['descripcionArt'] ?? '' }}</td>
        <td id="Centrar" class="col-precio">${{ $articulo['preUni'] ?? '' }}</td>
        <td id="Centrar" class="col-importe">${{$sub=$articulo['preUni']*$articulo['cantidad']}}</td>
      </tr>
      @php
          $subTOTAL+=$sub;
      @endphp
      <tr>
        <td id="Centrar" colspan="5" class="url-text">
          @if($articulo['url'])
            {{$articulo['url']}}
          @else
            <label id="Centrar">url no disponible</label>
          @endif
        </td>
      </tr>
    @endforeach
  @endif
</table>



    <table>
        <tr>
          <td class="ConC" rowspan="3">CONCEPTO DEL GASTO:</td>
          <td class="col2" id="Centrar">SUBTOTAL</td>
          <td id="Centrar">${{$subTOTAL}}</td>
        </tr>
        <tr>
          <td class="col2"></td>
          <td height="10"></td>
        </tr>
        <tr>
          <td class="col2" id="Centrar">TOTAL</td>
          <td id="Centrar">{{$subTOTAL}}</td>
        </tr>
        <tr>
          <td id="Centrar" colspan="3" style="font-size: 14px;">LOS TITULARES DE LAS ÁREAS DEL H. AYUNTAMIENTO O SUS EQUIVALENTES,
            SERAN RESPONSABLES EN EL EJERCICIO DE EJECUCÍON DE SU GASTO , DE SU GASTO , 
            TAL COMO LOS PREVEN LOS ARTICULOS  84 Y 85 DE LA LEY DE GENERAL CONTABILIDAD  GUBERNAMENTAL</td>
        </tr>
    </table>
    <table>
      <tr>
        <td width="332" height="50" style="position: relative;">
          <label style="position: absolute; top: 5px; left: 80px;">SOLICITA</label>
        </td>
        <td width="333" width="332" height="50" style="position: relative;">
            <label style="position: absolute; top: 5px; left: 80px;"> RECIBE</label>
          </td>
        <td width="332" width="333" width="332" height="50" style="position: relative;">
          <label style="position: absolute; top: 5px; left: 80px;"> ENTREGA</label>
        </td>
      </tr>

      <tr>
        <td id="Centrar">{{$data['name']}}</td>
        <td></td>
        <td id="Centrar">C. Uriel Octaviano Aguilar Garcia</td>
      </tr>

      <tr>
        <td id="Centrar">Nombre, Cargo y Firma</td>
        <td id="Centrar">Nombre, Cargo y Firma</td>
        <td id="Centrar"></td>
      </tr>

      <tr>
        <td height="50" width="332" style="position: relative;">
          <label style="position: absolute; top: 5px; left: 80px;"> AUTORIZA</label>
       
        </td>
        <td height="50" width="332" style="position: relative;">
          <label style="position: absolute; top: 5px; left: 80px;"> REVISA</label>

        </td>
        <td height="50" width="332" style="position: relative;">
            <label style="position: absolute; right: 28px;" >FECHA DE ENTREGADO <br> 
                <span style=" position: absolute; margin-left: 35px; top: 40px;">{{$data['fecha']}}</span> 
            </label>
        </td>
      </tr>
      <tr>
        <td id="Centrar">PRESIDENTE MUNICIPAL <br>LIC. JOSE LUIS MAYA TORRES</td>
        <td id="Centrar">TERORERIA MUNICIPAL <br> C.P. MARIA LYDIA SANCHEZ JAIME</td>
       <td id="Centrar" style="font-size: 14px;">DIA/MES/AÑO</td>
      </tr>


    </table>
  </div>
    
    
    </body>
</html>
