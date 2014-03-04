

	 <?php
	 session_start();
	 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
  $aux= $_POST['idpaq'];
  $_SESSION["falla"]=$_SESSION["falla"]+1;
  $con=$_SESSION["falla"];
  $_SESSION["reportar"][$con]=$aux;
javaalert('este es el codigo  '.$aux.$_SESSION["falla"]);
		  
  ?>  
 


    
 

