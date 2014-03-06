<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
session_start();

 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	iraURL("../index.php");
}elseif(!usuarioCreado()){
	iraURL("../pages/create_user.php");
	}
try {
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
$client = new SOAPClient($wsdl_url);
$client->decode_utf8 = false; 
$usu= array('idusu' => $_SESSION["Usuario"]->return->idusu);
$sede= array('idsed' => $_SESSION["Sede"]->return->idsed);
$param= array('registroUsuario' => $usu,
				'registroSede'=>$sede);
$rowContactos = $client->consultarBuzonXUsuario($param);
$rowDocumentos = $client->listarDocumentos();
$rowPrioridad = $client->listarPrioridad();
 if(!isset($rowContactos->return)){
   javaalert("Lo sentimos no se puede enviar correspondencia porque no tiene buzones creados");
  iraURL('../pages/inbox.php');
  }
  if(!isset($rowDocumentos->return)){
   javaalert("Lo sentimos no se puede enviar correspondencia porque no hay Tipos de documentos registrados,Consulte con el Administrador");
  iraURL('../pages/inbox.php');
  }
   if(!isset($rowPrioridad->return)){
   javaalert("Lo sentimos no se puede enviar correspondencia porque no hay Prioridades registradas,Consulte con el Administrador");
  iraURL('../pages/inbox.php');
  }
if(isset($_POST["enviar"])){//echo $_POST["datepicker"].'<br>';		
//echo '<br>'.date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datepicker"]))).'Lados___'.date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datepickerf"])));
			
//echo $_POST["contacto"].'_'.$_POST["asunto"].'_'.$_POST["doc"].'_'.$_POST["prioridad"].'_'.$_POST["datepicker"].'_'.$_POST["datepickerf"].'_'.$_POST["elmsg"];
	 	if(isset($_POST["contacto"]) && $_POST["contacto"]!=""  && isset($_POST["asunto"]) && $_POST["asunto"]!="" && isset($_POST["doc"]) && $_POST["doc"]!="" && isset($_POST["prioridad"]) && $_POST["prioridad"]!="" && isset($_POST["datepicker"]) && $_POST["datepicker"]!=""  && isset($_POST["datepickerf"]) && $_POST["datepickerf"]!="" && isset($_POST["elmsg"]) && $_POST["elmsg"]!=""){			
			if(!isset($_POST["rta"])){
			 $rta="0";
			 }else{
			 $rta="1";
			 }
			$origenpaq= array('idusu' => $_SESSION["Usuario"]->return->idusu);
			$Parametros= array('userUsu' =>$_POST["contacto"],
			            'idUsuario'=>$origenpaq);
            $usuarioBuzon = $client->consultarBuzonXNombreUsuario($Parametros);
			
			if(isset($usuarioBuzon->return)){
					$destinopaq= array('idbuz' => $usuarioBuzon->return->idbuz);
			$prioridad= array('idpri' => $_POST["prioridad"]);
			$documento= array('iddoc' => $_POST["doc"]);
				$sede= array('idsed' => $_SESSION["Sede"]->return->idsed);

			$paquete=array('origenpaq' => $origenpaq,
							'destinopaq' => $destinopaq,
							'asuntopaq' => $_POST["asunto"],
							'textopaq' => $_POST["elmsg"],
							'fechapaq' => date("Y-m-d"),
							'fechaenviopaq' => date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datepickerf"]))),
							'fechaapaq' => date('Y-m-d', strtotime(str_replace('/', '-', $_POST["datepicker"]))),
							'statuspaq' => "0",
							'localizacionpaq' => $_SESSION["Usuario"]->return->userusu,
							'idpri' => $prioridad,
							'iddoc' => $documento,
							'respaq' => $rta,
							'idsed'=>$sede);
							$registro= array('registroPaquete' => $paquete);					
			$envio=$client->crearPaquete($registro);		//pilas ismael
		//	echo 'yaaaa';
			if($_FILES['imagen']['name']!=""){
					$imagenName= $_FILES['imagen']['name'];
					$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; //posibles caracteres a usar
					$numerodeletras=5; //numero de letras para generar el texto
					$cadena = ""; //variable para almacenar la cadena generada
					for($i=0;$i<$numerodeletras;$i++){
						$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
						entre el rango 0 a Numero de letras que tiene la cadena */
					}
					
					$direccion="../images"; //para cargar
					$direccion2="images";//para guardar
					$tipo = explode('/',$_FILES['imagen']['type']);
					$uploadfile =$direccion."/adjunto/".$cadena.".".$tipo[1];
					$Ruta =$direccion2."/adjunto/".$cadena.".".$tipo[1];
						$imagen=$_FILES['imagen']['tmp_name'];
					move_uploaded_file($imagen,$uploadfile);	
					$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
			$client = new SOAPClient($wsdl_url);
			$client->decode_utf8 = false;
			$idPaquete=	$client->maxPaquete();
			$paq= array('idpaq' => $idPaquete->return);
			$adj= array('nombreadj' =>$imagenName,
			'urladj' =>$Ruta,
			'idpaq' =>$paq);
			$par=array('registroAdj' => $adj);
			$Rta=	$client->insertarAdjunto($par);
			
			}
			if($envio->return==0){
				javaalert("La correspondencia no ha podido ser enviada en estos momentos");
			}else{
				javaalert("La correspondencia ha sido enviada");
				llenarLog(1, "Envio de Correspondencia",$_SESSION["Usuario"]->return->idusu,$_SESSION["Sede"]->return->idsed);
			}
			iraURL('../pages/inbox.php');
			
			}else{
			javaalert("El Usuario al que desea enviar la correspondencia no esta registrado en sus contactos, por favor verifique");
			}
			
			
			}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
}
   include("../views/send_correspondence.php");
  } catch (Exception $e) {
					javaalert('Lo sentimos no hay conexión');
					iraURL('../pages/inbox.php');
}
?>
