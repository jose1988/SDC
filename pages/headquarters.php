<?php
session_start();
//try{
include("../recursos/funciones.php");
require_once("../lib/nusoap.php");
$Sedes=$_SESSION["Sedes"];

if (isset($_POST["Biniciar"])) {
if(isset($_POST["sede"]) && $_POST["sede"]!=""){
  for($i=0;$i<count($Sedes->return);$i++){
	 if($Sedes->return[$i]->idsed==$_POST["sede"]){
	 $_SESSION["Sedes"]=$Sedes->return[$i];
	 break;
	 }
  }
  iraURL('../pages/inbox.php');
 
}else{

	javaalert('Debe escojer la sede');
}
}
	

include("../views/headquarters.php");
 
?>
