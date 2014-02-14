<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
session_start();

 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	iraURL("../index.php");
}
//try {
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
$client = new SOAPClient($wsdl_url);
$client->decode_utf8 = false; 
$usu= array('idusu' => $_SESSION["Usuario"]->return->idusu);
$usuario= array('registroUsuario' => $usu);
$rowContactos = $client->consultarBuzonXUsuario($usuario);
$rowDocumentos = $client->listarDocumentos();
$rowPrioridad = $client->listarPrioridad();
//echo '<pre>';
// print_r($rowContactos);

if(isset($_POST["enviar"])){//echo $_POST["datepicker"].'<br>';			echo date("Y-m-d",strtotime($_POST["datepicker"]));
			
//echo $_POST["contacto"].'_'.$_POST["asunto"].'_'.$_POST["doc"].'_'.$_POST["prioridad"].'_'.$_POST["datepicker"].'_'.$_POST["datepickerf"].'_'.$_POST["elmsg"];
	 	if(isset($_POST["contacto"]) && $_POST["contacto"]!=""  && isset($_POST["asunto"]) && $_POST["asunto"]!="" && isset($_POST["doc"]) && $_POST["doc"]!="" && isset($_POST["prioridad"]) && $_POST["prioridad"]!="" && isset($_POST["datepicker"]) && $_POST["datepicker"]!=""  && isset($_POST["datepickerf"]) && $_POST["datepickerf"]!="" && isset($_POST["elmsg"]) && $_POST["elmsg"]!=""){			
			if(isset($_POST["rta"])){
			 $rta="0";
			 }else{
			 $rta="1";
			 }
			$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
			$client = new SOAPClient($wsdl_url);
			$client->decode_utf8 = false;
			$origenpaq= array('idusu' => $_SESSION["Usuario"]->return->idusu);
			$Usuario= array('user' =>$_POST["contacto"]);
            $usuarioDestino = $client->consultarUsuarioXUser($Usuario);
			$destinopaq= array('idusu' => $usuarioDestino->return->idusu);
			$prioridad= array('idpri' => $_POST["prioridad"]);
			$documento= array('iddoc' => $_POST["doc"]);
			if(isset($_POST["nom_del_archivo"])){
			$imagen= $_POST["nom_del_archivo"];
			}
			$paquete=array('origenpaq' => $origenpaq,
							'destinopaq' => $destinopaq,
							'asuntopaq' => $_POST["asunto"],
							'textopaq' => $_POST["elmsg"],
							'fechapaq' => date("Y-m-d"),
							'fechaenviopaq' => date("Y-m-d",strtotime($_POST["datepickerf"])),
							'fechaapaq' => date("Y-m-d",strtotime($_POST["datepicker"])),
							'statuspaq' => "0",
							'localizacionpaq' => "SC",
							'idpri' => $prioridad,
							'iddoc' => $documento,
							'respaq' => $rta
							);
							$registro= array('registroPaquete' => $paquete);
			$client->crearPaquete($registro);		//pilas ismael
			}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
}
   include("../views/send_correspondence.php");
  /*} catch (Exception $e) {
					javaalert('Error al crear el documento');
				//	iraURL('../pages/index.php');
}*/
?>
