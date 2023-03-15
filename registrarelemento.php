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
        $cod = trim($_POST['cod']);
	$descripcion = trim($_POST['descripcion']);
        $retirado='NO';

     

       
	    
//////////////// Grabar Datos ///////////////////////////////

             $consulta = "INSERT INTO `elementos` (fecha, categoria, cod, descripcion, retirado) 
                          VALUES ('$fecha','$categoria','$cod','$descripcion', '$retirado')";
               $resultado = mysqli_query($conex,$consulta);


               //////////   enviando a PDF //////////
               if ($resultado) {
                      
   
                       echo "
                       <h3 class='ok'>Contrato Guardado Exitosamente, Aguarde un momento</h3>
                       
               <script> alert('GUARDADO CON EXITO');
                       location.href = 'formaltaelemento.php'
               </script>";
               } else {
                       ?> 
                       <h3 class="bad">¡Ups ha ocurrido un error!</h3>
              <?php
               echo "<script> alert('ERRO AL GRABAR');
               location.href = '/ortopediapaviotti/formulario.php';
              </script>";
               }
       
   
   ?>