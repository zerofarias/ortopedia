<?php 

session_start();
if (@!$_SESSION['user']) {
        header("Location:index.php");
}elseif ($_SESSION['rol']==1) {
        header("Location:admin.php");
}


require("con_db.php");


///////////// RECIBE ALTA USUARIO por POST ////////////
     
        

        $usuario =  trim($_POST['usuario']);   
        $contra = trim($_POST['contra']);
        $fullnombre = trim($_POST['fullnombre']);
	    $rol = trim($_POST['rol']);
    

     

       
	    
//////////////// Grabar Datos ///////////////////////////////

             $consulta = "INSERT INTO `login` (user, password , fullnombre, rol) 
                          VALUES  ('$usuario','$contra','$fullnombre','$rol')";
               $resultado = mysqli_query($conex,$consulta);


               //////////   enviando a PDF //////////
               if ($resultado) {
                      
   
                       echo "
                       <h3 class='ok'>Usuario Generado , Aguarde un momento</h3>
                       
               <script> alert('GUARDADO CON EXITO');
                       location.href = '/ortopediapaviotti/altausuario.php'
               </script>";
               } else {
                       ?> 
                       <h3 class="bad">¡Ups ha ocurrido un error!</h3>
              <?php
               echo "<script> alert('ERRO AL GRABAR');
               location.href = 'index.php';
              </script>";
               }
       
   
   ?>