<?php
session_start();
$_SESSION['user']=null;
include_once("../../CONFIG/datosBD.php");
$conexion = new conexion;
$conex=$conexion->closeConex();
$conex=null;
session_unset();
session_destroy();
clearstatcache();
header("Location: ../../index.php");
