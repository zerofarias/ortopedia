<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="imagenes/favicon.png" type="image/png" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">
</head>
<body>
<!-- Hola qué tal, te recuerdo que la web es de uso libre -->
<!-- usala para lo que desees y no olvides suscribirte a AlexCG Design -->
<!-- Web hecha por AlexCG Design, si te sirvió la plantilla por favor entra a AlexCG Design -->
<!-- ->>>> https://www.youtube.com/alexcgdesign <<<<- -->
    <form action="validar.php" method="post">
        <div class="form">
            <h2>Formulario Ortopedicos</h2>
            <div class="grupo">
                <input type="text" name="user" required required><span class="barra"></span>
                <label>Nombre</label>
            </div>
            <div class="grupo">
                <input type="password" name="pass" required><span class="barra"></span>
                <label>Contraseña</label>
            
            </div>
            <button type="submit">Inciar sesion</button>
        </div>
    </form>
</body>
</html>