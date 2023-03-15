<?php
session_start();
if (@!$_SESSION['user']) {
        header("Location:index.php");
}elseif ($_SESSION['rol']==1) {
        header("Location:admin.php");
}
include 'mostrar.php';
function getPlantilla ($Conexion, $IdRegistro){
////////////////////////   consulta tabla datos      /////////////////////////////
 $consulta = 'SELECT * FROM `datos` WHERE id=' . $IdRegistro;
 $resul = mysqli_query($Conexion ,$consulta);
 $datos = mysqli_fetch_array ($resul);
 $categoria = $datos['elemento'];

 /////////////////////////   consulta tabla  USERS  //////////////////////////////////////////////

$consulta2 = 'SELECT `id`, `user`, `password`, `fullnombre`, `pasadmin`, `rol` FROM `login` WHERE id='.$_SESSION['id'];
$resul2 = mysqli_query($Conexion ,$consulta2);
 $datos2 = mysqli_fetch_array ($resul2);




/////////////////////     Convierte Fecha de formato YYYY/mm/dd   a dd/mm/YYYY     ////////////////

 $fecha=date('d-m-Y',strtotime($datos['fecha']) );
 $fechapactada=date('d-m-Y',strtotime($datos['fechapactada']) );

 $plantilla ='

<!DOCTYPE html>

 <head></head>   
<body>
<h2 class="numeroid">Nº '. trim($datos['id']). ' </h2>
    <header class="clearfix">
    
      <div class="logaso" id="logo">
        <img src="img/logo.png" width="400" heigth="200" >
      </div>
      
      <div class="Titulaso"><H1>CONTRATO PRÉSTAMO DE BIENES MUEBLES</H1></H1></div>
      <div id="company">
      
        <h2 class="name">SERVICIOS SOCIALES PAVIOTTI   / A.M.S.S.I</h2>
    
      </div>
      </div>
      <hr size="2px" color="black" />
      <p></p>
    </header> 
    
    <p class="normal"> - Apellido y Nombre: <b>'. trim($datos['apellido']). ' '. trim($datos['nombre'] ).'</b> 
    - DNI:<b>'. trim($datos['dni'] ).'</b> - Num. Contrato:  <b>'. trim($datos['afi'] ).'</b> <br>
    - Direccion: <b>'. trim($datos['direccion'] ).'</b> - Localidad: <b>'. trim($datos['localidad'] ).'</b> - Tel: <b>'. trim($datos['tel'] ).'</b>
    
    <p>
    En la ciudad de Villa María en la fecha <b>'. $fecha.'</b> entre <i>"SERVICIOS SOCIALES PAVIOTTI S.R.L"</i>
    con domicilio legal en calle Entre Ríos N° 589, de la ciudad de Villa María, Provincia de Córdoba, en adelante 
    la “COMODANTE” y el/la solicitante, cuyos datos se detallan al pie de este documento, 
    en adelante el “COMODATARIO”, convienen celebrar el presente contrato de comodato 
    (préstamo de bienes muebles), sujeto a las cláusulas que seguidamente se detallan:

    </p>
    <p> 
    PRIMERA: La “COMODANTE” le entrega en comodato al “COMODATARIO” el elemento que a 
    continuación se indica <b> '. trim($datos['elemento'] ).'</b>  Nº <b> '. trim($datos['cod'] ).'</b>
    en perfecto estado de higiene y conservación, quien lo recibe de plena conformidad y se
     compromete a utilizarlo personalmente, sin afectarlo a otro fin.
      
    <p>SEGUNDA: El comodato es convenido por el término de treinta (30) días a contar desde el día de la fecha.
     Por lo tanto, su vencimiento opera el <b>'.$fechapactada.'</b></p>


    <p> TERCERA: En este acto el “COMODATARIO” efectúa un depósito de  <b>$'. trim($datos['precio'] ).',00 Pesos</b>
    en carácter de garantía del elemento que le es entregado. Este importe le será inmediatamente 
    reintegrado, si el elemento en cuestión es devuelto en el término acordado y en las condiciones
    de higiene y conservación, en las que le fue oportunamente suministrado.</p>

  <p>CUARTA: Cualquier observación que el “COMODATARIO” desee informar a la “COMODANTE”,
   respecto al estado y/o funcionalidad del elemento prestado, deberá formularla inexcusablemente, 
   dentro de las veinticuatro (24) horas de celebrado el presente contrato.</p> 
   
  <p>QUINTA: El “COMODATARIO” se obliga a devolver el elemento prestado en iguales condiciones 
  de higiene y conservación en las que lo recibió, salvo el deterioro que el normal uso ocasione.
   Asimismo, se compromete a mantener visibles y no alterar y/o suprimir los signos identificatorios 
   que le hayan sido colocados al elemento por la “COMODANTE”. Caso contrario, el “COMODATARIO” 
   responderá por la totalidad de los daños y/o desperfectos que sufriera el elemento recibido en 
   comodato, aun así, los derivados de caso fortuito o fuerza mayor.</p> 
 
   <p>SEXTA: El “COMODATARIO” quedará en mora automáticamente respecto a la obligación de restituir 
   el elemento, y en su caso, de abonar el precio, por el solo vencimiento del plazo 
   estipulado en este contrato, sin necesidad de requerimiento alguno.</p>

   <p>SEPTIMA: A la conclusión del plazo de préstamo el “COMODATARIO” 
   deberá cesar de inmediato en el uso del elemento prestado y ponerlo a disposición 
   de la “COMODANTE” en su domicilio (sito en calle Entre Ríos N° 589, de la ciudad de Villa María,
    Provincia de Córdoba).</p>

   <p>OCTAVA: Si vencido el termino del presente contrato el “COMODATARIO” necesitara continuar 
   utilizando el elemento otorgado en préstamo, la “COMODANTE” puede 
   (de acuerdo con la disponibilidad que tenga en relación con el mismo) otorgárselo 
   en alquiler por periodos mensuales, trasladándose en este caso, todos los derechos y 
   obligaciones estipulados en este contrato.
    El valor mensual de alquiler será de <b>$'. trim($datos['precio'] ).',00 Pesos</b>.</p>  

    <p>NOVENA: En caso de pérdida, extravío, hurto o robo del elemento prestado, 
    el “COMADATARIO” abonará a la “COMODANTE”, a título indemnizatorio,
     la suma equivalente al valor en plaza del elemento prestado,
      estipulado en <b> $ '. trim($datos['preciofull'] ).',00 Pesos</b>. </p>

     <p>DECIMA: El “COMODATARIO” autoriza, en caso de fallecimiento, a la entrega a la “COMODANTE” 
     del elemento prestado, valiendo el presente de expresa conformidad, atento al alto sentido social 
     y humano del préstamo realizado</p>

     <p>DECIMA PRIMERA: Para todos los efectos judiciales y extrajudiciales derivados del 
     presente contrato, las partes constituyen domicilio en los precedentemente indicados, 
     teniéndose por válidas todas las notificaciones que allí se cursaren. Asimismo, 
     renuncian a todo fuero o jurisdicción que no sea el de los Tribunales Ordinarios 
     de la ciudad de Villa María, a los efectos de someter las divergencias que se susciten.<p>
       De conformidad se firman dos ejemplares de un mismo tenor y un solo efecto en el lugar y fecha de encabezamiento.</p>



  

 <div class="puntos">
<p> --------------------------------------------- </p>
 </div>
 
 <div class="puntosl">
<p> --------------------------------------------- </p>
 </div>

       <div class="Firma">
       <i> Apellido y Nombre:    '  . trim($datos['retira']). '  <br>   
       DNI : '. trim($datos['dniretira']).' </i>
       </div>


       


       <div class="FirmaLanaturaleza">
       <i>Servicios Sociales Paviotti<br>
       <i>Colaborador: </i>'  . trim($datos2['fullnombre']). '<i>
       
       </div>
        
        
    <div class="footer">
      <i>Grupo Empresario Paviotti Tel:0353 4520218 </i>
    </div>
  </body>
</html>';
return $plantilla;


}