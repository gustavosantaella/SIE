<?php 
session_start();

function sesion(){

	if (!$_SESSION['user']&&!$_SESSION['rol']) {
		header("location:/SIE/");
	}
}

function sesionIndex(){
	session_start();
	if ($_SESSION['user']||$_SESSION['rol']) {

		header("location:VIEW/index.php");
	}
}

function errores(){

	error_reporting(E_ALL);
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', '1');
	error_reporting(-1);

}

function NoError(){

	error_reporting(0);
}

function sesionAdmin(){

	if ($_SESSION['rol']==='invitado') {
		header("location:../../VIEW/");
	}
}

function sesionSu(){

	if ($_SESSION['rol']!='SU'&&$_SESSION['user']!='adminweb') {
		header("location:../../VIEW/");
	}
}

