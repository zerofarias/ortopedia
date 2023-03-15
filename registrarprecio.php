<?php 

session_start();
if (@!$_SESSION['user']) {
        header("Location:index.php");
}elseif ($_SESSION['rol']==1) {
        header("Location:admin.php");
}


require("con_db.php");


///////////// RECIBE ALTA ELEMENTO ATRAVEZ DE POST////////////
     
        

        $fecha =  trim($_POST['fecha']);   
        $categoria = trim($_POST['categoria']);
        $afi = trim($_POST['afi']);
	    $noafi = trim($_POST['noafi']);
         $full = trim($_POST['full']);

     

       
	    
//////////////// Grabar Datos ///////////////////////////////

                 $updatedatos = "UPDATE `precios` SET 
                 `fecha`='$fecha',`precio`='$afi',`noafiliado`='$noafi',`completo`='$full' WHERE id=".$categoria;
                 $resultado = mysqli_query($conex,$updatedatos);

                   



               //////////   enviando a PDF //////////
               if ($resultado) {
                      
   
                       echo "
                       <h3 class='ok'>Precio Actualizado Exitosamente, Aguarde un momento</h3>
                       
               <script> alert('GUARDADO CON EXITO');
                       location.href = '/ortopediapaviotti/cambioprecio.php'
               </script>";
               } else {
                       ?> 
                       <h3 class="bad">¡Ups ha ocurrido un error!</h3>
              <?php
               echo "<script> alert('ERRO AL GRABAR');
               location.href = 'formulario.php';
              </script>";
               }
       
   
   ?>