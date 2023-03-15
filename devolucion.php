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
    <title> Edicion de datos </title>
    
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
  <a href="" style="color: blue;">Usuario <strong><?php echo $_SESSION['fullnombre'];?></strong> </a>
  <a href="desconectar.php" style="float:right;color:blue"  class="derecha"> Cerrar Cesión </a>	
    <div class="title">Edicion de datos</div>
    <div class="content">
  
    	
    
    <ul class="nav pull-right">	 
		</ul>
    <?php
    include 'con_db.php';
    $IdRegistro=$_GET['id'];
  $consulta = "SELECT * FROM `datos` WHERE id=". $IdRegistro;
  $resul = mysqli_query($conex,$consulta);




   while ($filas=mysqli_fetch_assoc($resul)){ ?>


  
      <form method="POST"  action="">
      
        <div class="user-details">
          
          
          <div class="input-box" >
            <span class="details">Nombre</span>
            <input type="text" name="nombre" value="<?php echo $filas['nombre'] ?>">
           
          </div>
          <div class="input-box">
            <span class="details">Apellido</span>
            <input type="text" name="apellido" value="<?php echo $filas['apellido'] ?>"  required>
          </div>
          <div class="input-box">
            <span class="details">Nº Afiliado</span>
            <input type="number" name="afi" value="<?php echo $filas['afi'] ?>"  required>
          </div>
          <div class="input-box">
            <span class="details">DNI</span>
            <input type="number" name="dni" value="<?php echo $filas['dni'] ?>"  required>
          </div>   
          <div class="input-box">
            <span class="details">Elemento</span>
            <input type="text" name="elemento" value="<?php echo $filas['elemento'] ?>"  required>
          </div>
          <div class="input-box">
            <span class="details">Cod</span>
            <input type="num" name="cod" value="<?php echo $filas['cod'] ?>" placeholder="Ingrese Nivel" required>
          </div>  
          <div class="input-box">
            <span class="details">Fecha Devolucion</span>
            <input type="date" name="fechadevo"  required>
          </div>
          <div class="input-box">
            <span class="details">Estado del Elemento</span>
            <input type="text" name="estadoelemento" required>
          </div>  

          </div><div class="gender-details">
              <span class="gender-title"></span>
              <div class="user-details">
          <div class="category">
          </div>
        </div>
        <div class="button">
          <input type="submit" name="editar" value="Generar Devolucion" id="register">
        </div>
        <div class="button">
        
      </form>
    <?php } ?>
    </div>
  </div>
  <?php
      $nombre = trim($_POST['nombre']);
      $apellido = trim($_POST['apellido']);
      $afi = trim($_POST['afi']);
      $dni = trim($_POST['dni']);
      $elemento = trim($_POST['elemento']);
      $cod = trim($_POST['cod']);
      $fechadevo = trim($_POST['fechadevo']);
      $estadoelemento = trim($_POST['estadoelemento']);
      $devuelto ='SI';
      $retirado='NO';


      $id_usuariodevu=$_SESSION['id'];
      $IdRegistro=$_GET['id'];
      if (isset($_POST['editar'])) {

        ///////////update tabla elementos/////////////////
    $updateelementos = "UPDATE elementos SET `retirado`='$retirado',`fecha`='$fechadevo'
    WHERE cod=".$cod;
       $resultado = mysqli_query($conex,$updateelementos);
     
       /////////////////////update tabla datos///////////////
   
   $updatedatos = "UPDATE datos SET `nombre`='$nombre',`apellido`='$apellido'
    ,`afi`='$afi',`dni`='$dni' ,`elemento`='$elemento',`cod`='$cod'
    ,`fechadevo`='$fechadevo',`estadoelemento`='$estadoelemento' ,`devuelto`='$devuelto',`id_usuariodevu`='$id_usuariodevu'  WHERE id=".$IdRegistro;
       $resultado2 = mysqli_query($conex,$updatedatos);
        if ($resultado && $resultado2) {
        

        echo "<h3 class='ok'> Espere un momento mientras se imprime el Formulario</h3>
        <br>
            <script> alert('GUARDADO CON EXITO');
                    location.href = 'pdfticket.php?id=$IdRegistro'
            </script>";
      } else {
        ?> 
        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
            echo "<script> alert('ERRO AL GRABAR');
            location.href = 'index.php';
           </script>";
      }
     }

?>
</div>
</body>
</html>

