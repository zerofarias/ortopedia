<?php 

session_start();
if (@!$_SESSION['user']) {
        header("Location:index.php");
}elseif ($_SESSION['rol']==1) {
        header("Location:admin.php");
}


include("con_db.php");



     
        $fecha =  trim($_POST['fecha']);   
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
	$dni = trim($_POST['dni']);
        $afi = trim($_POST['afi']);
	$tel = trim($_POST['tel']);
	$direccion = trim($_POST['direccion']);
	$localidad = trim($_POST['localidad']);
        $elemento = trim($_POST['elemento']);
        $importe= trim($_POST['importe']);
        $fechapactada=  trim($_POST['fechapactada']); 
        $mail = trim($_POST['mail']);
	$retira = trim($_POST['retira']);
        $dniretira = trim($_POST['dniretira']);


        $id_usuario = ($_SESSION['id']);
        $retirado='SI';

        ////////////////////   consulta elementos   ////////////////
        $consulta = 'SELECT * FROM `elementos` WHERE id=' . $elemento;
 $resul = mysqli_query($conex ,$consulta);
 $datos = mysqli_fetch_array ($resul);
        $categoria = $datos['categoria'];
        $cod = $datos['cod'];


        //////////////////  Consulta Precio  ///////////////

        $precio = 'SELECT * FROM `precios` WHERE id=' . $importe;
 $sqll = mysqli_query($conex ,$precio);
 $datos3 = mysqli_fetch_array ($sqll);
       $precio1 = $datos3['precio'];
       $precio2 = $datos3['noafiliado'];
       $precio3 = $datos3['completo'];


       
	    
//////////////// Grabar Datos ///////////////////////////////

             $consulta = "INSERT INTO datos( fecha,fechapactada, nombre, apellido, dni, 
            afi, tel,mail, direccion, localidad, elemento,cod,precio,precionoafi,preciofull, id_usuario,retira,dniretira) 
            VALUES ('$fecha','$fechapactada','$nombre','$apellido','$dni', '$afi', 
            '$tel', '$mail','$direccion','$localidad','$categoria','$cod','$precio1','$precio2','$precio3','$id_usuario','$retira','$dniretira')";

    ///////////////////// Editar  elemento //////////////////////

    $updatedatos = "UPDATE elementos SET `retirado`='$retirado',`fecha`='$fecha' WHERE id=".$elemento;
         $resultado2 = mysqli_query($conex,$updatedatos);
	    
            $resultado = mysqli_query($conex,$consulta);


            //////////   enviando a PDF //////////
	    if ($resultado) {
	    	$UltId = mysqli_insert_id($conex );

	    	echo "<br><br>
                    <h3 class='ok'>Contrato Guardado Exitosamente, Aguarde un momento</h3>
	    	<br>
            <script> alert('GUARDADO CON EXITO');
                    location.href = 'pdf.php?id=$UltId'
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