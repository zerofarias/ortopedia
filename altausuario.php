<!DOCTYPE html>
<?php
	session_start();
	if (@!$_SESSION['user']) {
		header("Location:index.php");
	}elseif ($_SESSION['rol']==1) {
		header("Location:admin.php");
	}

	?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ortopedia Paviotti</title>
    
<link  rel="icon"   href="img/logo.png" type="logo/png" />

<link  rel="icon"   href="imagenes/favicon.png" type="image/png" />
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
<div>
<?php  

include ('barra/index.php'); 
require("con_db.php"); ?>
  <div class="container">
    <div class="title">Alta De Usario</div>
    <div class="content">
    <ul class="nav pull-right">
    <a href="" style="color: blue;">Usuario <strong><?php echo $_SESSION['fullnombre'];?></strong> </a>
  <a href="desconectar.php" style="float:right;color:blue"  class="derecha"> Cerrar Cesión </a>		 
		</ul>
      <form method="POST"  action="registrarusuario.php">
      
        <div class="user-details">
        <div class="input-box">
            <span class="details">Usuario</span>
            <input type="text" name="usuario" placeholder="Ingrese User" required>
          </div>
          <div class="input-box">
            <span class="details">Contraseña</span>
            <input type="password" name="contra" placeholder="Ingrese Password" required>
          </div>
         
          <div class="input-box">
            <span class="details">Nombre Completo</span>
            <input type="text" name="fullnombre" placeholder="Aparecera en los Comprobantes" required>
          </div>
          <div class="input-box">
            <span class="details">Rol de Usuario</span>
            <select name="rol" id="" required>
              <option value="2">Usuario Estandar</option>
              <option value="1">Administrador</option>
            </select>
          </div>
         
          
        </div>
            
         
            <div class="gender-details">
              <span class="gender-title"></span>
              <div class="user-details">
          <div class="category">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Crear Usuario" id="register">
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
