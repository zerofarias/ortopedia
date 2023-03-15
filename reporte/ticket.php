<?php
session_start();
if (@!$_SESSION['user']) {
        header("Location:index.php");
}elseif ($_SESSION['rol']==1) {
        header("Location:admin.php");
}
include 'mostrar.php';
function getPlantilla ($Conexion, $IdRegistro){

 $consulta = 'SELECT * FROM `datos` WHERE id=' . $IdRegistro;
 $resul = mysqli_query($Conexion ,$consulta);
 $datos = mysqli_fetch_array ($resul);

$consulta2 = 'SELECT * FROM `login` WHERE id='.$_SESSION['id'];
$resul2 = mysqli_query($Conexion ,$consulta2);
 $datos2 = mysqli_fetch_array ($resul2);

 $fecharetira=date('d-m-Y',strtotime($datos['fecha']) );
 $fechadevuelve=date('d-m-Y',strtotime($datos['fechadevo']) );
 

 $plantilla ='

<!DOCTYPE html>

 <head></head>   
<body>


        <img src="img/logo.png" width="300" heigth="150" class="logoticket" >
      


<H4 class="ticket">DEVOLUCION </H4>
<H4 class="ticket">ELEMENTOS ORTOPEDICOS</H4>
  <br>
  <p class="ticket1"><i> Fecha retiro: </i> <b>'.$fecharetira. '</b></p>
  <p class="ticket1"><i> Fecha devolucion: </i><b>'.  $fechadevuelve. '</b></p>
  <p class="ticket1"><i> Apellido y Nombre: </i><b>'. trim($datos['apellido']). ' '. trim($datos['nombre']). '</b></p>
  <p class="ticket1"><i> Elemento: </i><b>'. trim($datos['elemento']). '</b></p>
  <p class="ticket1"><i> Cod: </i><b>'. trim($datos['cod']). '</p>
  <p class="ticket1"><i> Estado: </i><b>'. trim($datos['estadoelemento']). '</p>
  <p class="ticket1"><i> Usuario: </i><b>'. trim($datos2['fullnombre']). '</b></p>

  <p class="ticketfin">Gracias Por Elegirnos</p>
  
  
  </body>
</html>';
return $plantilla;


}