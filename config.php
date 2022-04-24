<?php
$usuario  = "dbu867614";
$password = "@@N9DRCAsW";
$servidor = "db5007337803.hosting-data.io";
$basededatos = "dbs6045522";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");

?>
