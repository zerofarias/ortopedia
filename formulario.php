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
    <title> Contrato de Ortopedicos </title>
    
<link  rel="icon"   href="img/logo.png" type="logo/png" />

<link  rel="icon"   href="imagenes/favicon.png" type="image/png" />
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
<div>
<?php  

include ('barra/index.php'); ?>
  <div class="container">
    <div class="title">Contrato de Ortopedicos</div>
    <div class="content">
    <ul class="nav pull-right">
    <a href="" style="color: blue;">Usuario <strong><?php echo $_SESSION['fullnombre'];?></strong> </a>
  <a href="desconectar.php" style="float:right;color:blue"  class="derecha"> Cerrar Sesión </a>		 
		</ul>
      <form method="POST"  action="registrar.php">
      
      <div class="user-details">
          <div class="input-box">
            <span class="details">Fecha Retiro</span>
            <input type="date" name="fecha" placeholder="Ingrese Fecha De Retiro" required>
          </div>
          <div class="input-box">
            <span class="details">Fecha Devolucion</span>
            <input type="date" name="fechapactada" placeholder="Ingrese Fecha de Devolucion" required>
          </div>
          
          <div class="input-box">
            <span class="details">Nombre</span>
            <input type="text" name="nombre" placeholder="Ingrese Nombre Completo" required>
          </div>
          <div class="input-box">
            <span class="details">Apellido</span>
            <input type="text" name="apellido" placeholder="Ingrese Apellido" required>
          </div>
          <div class="input-box">
            <span class="details">DNI</span>
            <input type="text" name="dni" placeholder="Ingrese DNI" required>
          </div>
          <div class="input-box">
            <span class="details">Nª de Afiliado</span>
            <input type="text" name="afi" placeholder="Ingrese Numero de Afiliado" required>
          </div>
          <div class="input-box">
            <span class="details">Nª de Telefono</span>
            <input type="text" name="tel" placeholder="Ingrese Numero de Telefono" required>
          </div>
          <div class="input-box">
            <span class="details">E- Mail</span>
            <input type="text" name="mail" placeholder="Ingrese E-Mail - No Obligatorio" >
          </div>
          <div class="input-box">
            <span class="details">Direccion</span>
            <input type="text" name="direccion" placeholder="Ingrese Direccion" required>
          </div>
          <div class="input-box">
            <span class="details">Localidad</span>
            <input type="text" name="localidad" placeholder="Ingrese Localidad" required>
          </div>


          <div class="input-box">
             <span class="details">Elemento Ortopedico</span>
            <select name="elemento" >
              <?php  
              require("con_db.php");
              
              $consulta = "SELECT * FROM `elementos` WHERE `retirado` LIKE 'NO' ORDER BY `elementos`.`categoria` ASC ";
              
              $resul = mysqli_query($conex,$consulta);
              while ($filas=mysqli_fetch_array($resul)){  ?>
                      <option value="<?php echo $filas['id']?>"><?php echo $filas['categoria'].' Nª '.$filas['cod']; ?></option>
             

   
              <?php }  ?>         
              </select>
          </div>
          
          



          <div class="input-box">
            <span class="details">Lista Precios</span>
            <select name="importe">
              <?php  
             
              
              $consulta2 = "SELECT * FROM `precios`";

              $resul2 = mysqli_query($conex,$consulta2);
              while ($filas2=mysqli_fetch_array($resul2)){  ?>
                      <option value="<?php echo $filas2['id']?>"><?php echo $filas2['categoria'].' (afiliado$ '.$filas2['precio'] .') (NoAfiliado$ '.$filas2['noafiliado'].') (Rotura$ '.$filas2['completo'].')'; ?></option>
             
                <?php }  ?>         
              </select>
          </div>
          <div class="input-box">
            <span class="details">Persona que Retira</span>
            <input type="text" name="retira" placeholder="Apellido Nombre de quien Retira" required>
          </div>
          <div class="input-box">
            <span class="details">DNI Retira</span>
            <input type="text" name="dniretira" placeholder="DNI de quien Retira" required>
          </div>
        </div>
            
         
            <div class="gender-details">
              <span class="gender-title"></span>
              <div class="user-details">
          <div class="category">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Generar Contrato" id="register">
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
