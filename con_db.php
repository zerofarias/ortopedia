<?php

$conex = mysqli_connect("localhost","paviotti_lautaro","1fkyEb9Ix","paviotti_ortopedicos");
$conex->set_charset('utf8');
$tabla = "datos";
if ($conex->connect_errno) {
	echo "Nuestro sitio experimenta fallos....";
	# code...
}
