<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
		<meta charset="UTF-8">
    <title> Contrato de Ortopedicos </title>
    
<link  rel="icon"   href="img/logo.png" type="logo/png" />

<link  rel="icon"   href="imagenes/favicon.png" type="image/png" />
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto academias</title>
</head>
<body>
<div class="container">
<div class="title">Contrato de Ortopedicos</div>

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>
		<form action="validar.php" method="post">

		<table border="0">

		<tr><td><label<b>Correo: </b></label></td>
			<td> <input class="form-group has-success"  type="text" name="mail"></td></tr>
			
			<br><br>
		<tr><td><label><b>Contraseña: </b></label></td>
		
			<td ><input  type="password" name="pass"></td></tr>
		<tr><td></td>
			<td width=80 align=center><input class="btn btn-primary" type="submit" value="Aceptar"></td>
			</tr></tr></table>
		</form>
<br>
<!-- formulario registro -->

</div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		
</div>
	
</body>
</html>