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
    <title> Alta Elemento </title>
    
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
    <div class="title">Alta Elementos Ortopedicos</div>
    <div class="content">
    <ul class="nav pull-right">
    <a href="" style="color: blue;">Usuario <strong><?php echo $_SESSION['fullnombre'];?></strong> </a>
  <a href="desconectar.php" style="float:right;color:blue"  class="derecha"> Cerrar Cesión </a>		 
		</ul>
      <form method="POST"  action="registrarelemento.php">
      
        <div class="user-details">
          <div class="input-box">
            <span class="details">fecha</span>
            <input type="date" name="fecha" placeholder="Ingrese Fecha" required>
          </div>
          <div class="input-box">
            <span class="details">categoria</span>
            <select name="categoria">
              <?php  
             
              
              $consulta2 = "SELECT * FROM `precios`";

              $resul2 = mysqli_query($conex,$consulta2);
              while ($filas2=mysqli_fetch_array($resul2)){  ?>
                  <option value="<?php echo $filas2['categoria']?>"><?php echo $filas2['categoria']; ?></option>   
             

   
              <?php }  ?>         
              </select>
          </div>
          <div class="input-box">
            <span class="details">Codigo</span>
            <input type="text" name="cod" placeholder="Ingrese Nombre Codigo" required>
          </div>
          <div class="input-box">
            <span class="details">Descripcion</span>
            <input type="text" name="descripcion" placeholder="Ingrese descripcion" required>
          </div>
          
        </div>
            
         
            <div class="gender-details">
              <span class="gender-title"></span>
              <div class="user-details">
          <div class="category">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="register" id="register">
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
