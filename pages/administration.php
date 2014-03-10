<?php

session_start();
try {
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if(!isset($_SESSION["Usuario"])){
	
	iraURL("../index.php");
	}

  } catch (Exception $e) {
	javaalert('Lo sentimos no hay conexión');
	iraURL('./index.php');	
	}

include("../views/administration.php");



?>
 

