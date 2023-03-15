<!DOCTYPE html>
<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
	}

	?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> administrar</title>
    
<link  rel="icon"   href="img/logo.png" type="logo/png" />

<link  rel="icon"   href="imagenes/favicon.png" type="image/png" />
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
<div>
<?php
 include ('barra/index.php'); 
require("con_db.php");
 $consulta = 'SELECT * FROM `precios` ORDER BY `id` DESC ';

 $resul = mysqli_query($conex,$consulta);
?>

<div class="container">
     
<a href="" style="color: blue;">Usuario <strong><?php echo $_SESSION['fullnombre'];?></strong> </a>
  <a href="desconectar.php" style="float:right;color:blue"  class="derecha"> Cerrar Cesión </a>

      
      
     <br> <br> <br>
      <div class="gender-details">
              <span class="gender-title"></span>
              <div class="user-details">
          <div class="category">
          </div>
        </div>
        <div class="button">
         
          <input type="button" style="width:100%; " onclick="location.href='precios.php';" value="💰 Lista De Precios" />
        </div> <br><br>
        <div class="button">
        <input type="button" style="width:100%; " onclick="location.href='formaltaelemento.php';" value="🩺 Alta De Elementos" />
        </div> <br><br>
        <div class="button">
        <input type="button" style="width:100%; " onclick="location.href='altausuario.php';" value="🙋‍♂️ Alta de Usuarios" />
        </div> <br><br>
        <div class="button">
        <input type="button" style="width:100%; " onclick="location.href='pendientes.php';" value="🕔 Pendientes De Devolucion" />
        </div>

      </div>
</body>
</html>