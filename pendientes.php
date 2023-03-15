<!doctype html>
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
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Pendientes De Devolucion</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
   <!-- CSS personalizado --> 
   <link rel="stylesheet" href="styletable.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  </head>
    
  <body> 
     <div>
       <?php
 include ('barra/index.php'); 
require("con_db.php");
 $consulta = "SELECT * FROM `datos` WHERE `devuelto` NOT LIKE 'Si' ORDER BY `datos`.`id` ASC ";

 $resul = mysqli_query($conex,$consulta);
?>
    <!--Ejemplo tabla con DataTables-->
    <div class="container">
         <a href="" style="color: blue;">Usuario <strong><?php echo $_SESSION['fullnombre'];?></strong> </a>
  <a href="desconectar.php" style="float:right;color:blue"  class="derecha"> Cerrar Cesión </a>    
    <div class="title">Pendientes de Devolucion</div>
    <div class="content">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%; text-align: center"><thead>
                   <tr>
                        <th>FechaRetiro</th>
                        <th>FechaPactada</th>
                        <th>Solicitante</th>
                        <th>Elemento</th>
                        <th>Cod</th>
                        <th>DNI</th>
                        <th>tel</th>
                        <th>Devuelto</th>
                   </tr>                         
             </thead>
             <tbody> 
                <?php 
               
                 while ($filas=mysqli_fetch_array($resul)){ ?>

                 <tr>
                   <td> <?php echo $filas['fecha'] ?></td>
                   <td> <?php echo $filas['fechapactada'] ?></td>
                   <td > <?php echo $filas['apellido']." ".$filas['nombre'] ?></td>
                   <td > <?php echo $filas['elemento'] ?></td>
                   <td> <?php echo $filas['cod'] ?></td>
                   <td> <?php echo $filas['dni'] ?></td>
                   <td> <?php echo $filas['tel'] ?></td>
               
                 
                   <td> 
                         <button type="button" style="padding: 9px ; color:green; background-color: #F8EA5E ; border-radius: 12px;" title="Generar Devolucion"><a href="devolucion.php?id=<?php echo $filas['id'] ?>">✔</a></button> 

            
                   </td>  

                 </tr>   
                 <?php } ?>  
             </tbody>         
     </table>
</div>
                </div>
        </div>  
    </div>    
      
  </div>  
    </div>    
       
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
   <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script> 
    </div>
  </body>
</html>
