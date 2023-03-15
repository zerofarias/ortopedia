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
    <title> Precios </title>
    
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
        <div class="button">
         
         <input type="button" style="width:100%; " onclick="location.href='cambioprecio.php';" value="💰 Actualiza Precios" />
       </div> <br>

        <div>
     <table border="1" style="text-align: center;">
             <thead>
                   <tr>
                        <th>Tipo Elemento</th>
                        <th>Actualizado</th>
                        <th>Afiliado</th>
                        <th>No Afiliado</th>
                        <th>Completo</th>
                        
                   </tr>                         
             </thead>
             <tbody> 
                 <?php 
              
                 while ($filas=mysqli_fetch_array($resul)){ ?>

                 <tr>
                   <td> <?php echo $filas['categoria'] ?></td>
                   <td> <?php echo $filas['fecha'] ?></td>
                   <td > <?php echo $filas['precio']?></td>
                   <td > <?php echo $filas['noafiliado'] ?></td>
                   <td> <?php echo $filas['completo'] ?></td>
                   
               
                  
                 </tr>   
                 <?php } ?>  
             </tbody>         
     </table>
</div>
      </div>
</body>
</html>