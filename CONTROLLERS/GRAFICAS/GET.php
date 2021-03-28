<?php 



# personas contagiadas
if (isset($_GET['personas']) && isset($_GET['fecha']) && isset($_GET['centros'])){


	$personas= $_GET['personas'];
	$fecha= $_GET['fecha'];
	$centros = $_GET['centros'];


}


# encuesta patria
if (isset($_GET['fecha']) && isset($_GET['contagiados']) && isset($_GET['encuesta'])){

	$fecha= $_GET['fecha'];
	$contagiados= $_GET['contagiados'];
	$encuesta = $_GET['encuesta'];

}


#rcfve
if (isset($_GET['recu']) && isset($_GET['fallecidos']) && isset($_GET['contagiados'])&& isset($_GET['masculino'])&& isset($_GET['femenino'])&& isset($_GET['fecha'])) {

	$recuperados= $_GET['recu'];
	$contagiados= $_GET['contagiados'];
	$fallecidos = $_GET['fallecidos'];
	$masculino  = $_GET['masculino'];
	$femenino   = $_GET['femenino'];
	$fecha      = $_GET['fecha'];


}

#contagiadso por estados
if (isset($_GET['contagiados'])&& isset($_GET['fecha'])&& isset($_GET['estados'])) {
	
	$estados  = $_GET['estados'];
	$fecha   = $_GET['fecha'];
	$contagiados      = $_GET['contagiados'];
}


#contagiados por municipios
if (isset($_GET['codmun']) && isset($_GET['estado']) && isset($_GET['municipio']) &&  isset($_GET['codest']) && isset($_GET['recuperados']) && isset($_GET['contagiados']) && isset($_GET['fallecidos']) && isset($_GET['fecha'])  ) {
	
	$recuperados= $_GET['recuperados'];
	$contagiados= $_GET['contagiados'];
	$fallecidos = $_GET['fallecidos'];
	$estado  = $_GET['estado'];
	$municipio   = $_GET['municipio'];
	$fecha      = $_GET['fecha'];

}

#contagiados por parroquias 

if (isset($_GET['codmun']) && isset($_GET['estado']) && isset($_GET['desmun']) &&  isset($_GET['codest']) && isset($_GET['recuperados']) && isset($_GET['contagiados']) && isset($_GET['fallecidos']) && isset($_GET['fecha']) && isset($_GET['par'])  ) {
	
	$recuperados= $_GET['recuperados'];
	$contagiados= $_GET['contagiados'];
	$fallecidos = $_GET['fallecidos'];
	$estado  = $_GET['estado'];
	$municipio   = $_GET['desmun'];
	$fecha      = $_GET['fecha'];
	$despar      = $_GET['par'];



}

if (isset($_GET['recuperados'])&&isset($_GET['contagiados'])&&isset($_GET['fallecidos'])&&isset($_GET['fecha'])&&isset($_GET['paises'])) {

	$recuperados= $_GET['recuperados'];
	$contagiados= $_GET['contagiados'];
	$fallecidos= $_GET['fallecidos'];
	$fecha= $_GET['fecha'];
	$paises= $_GET['paises'];
}

if (isset($_GET['afectados'])&&isset($_GET['fallecidos'])&&isset($_GET['fecha'])&&isset($_GET['paises'])) {


	$fecha =$_GET['fecha'];
	$afectados =$_GET['afectados'];
	$fallecidos =$_GET['fallecidos'];
	$paises= $_GET['paises'];
}

