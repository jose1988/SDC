<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
<?php
session_start();

 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
if(!isset($_SESSION["Usuario"])){
	
	iraURL("../pages/index.php");
	}
 try {
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/mariela?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
 $Sedes = $client->listarSedes();

if(isset($_POST["crear"])){
	 	if(isset($_POST["nombre"]) && $_POST["nombre"]!=""  && isset($_POST["apellido"]) && $_POST["apellido"]!="" && isset($_POST["correo"]) && $_POST["correo"]!="" && isset($_POST["sede"]) && $_POST["sede"]!=""){		

			 if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_POST["correo"])){						
						$correo=$_POST["correo"];
							$telefono1="";
			$telefono2="";
			$direccion1="";
			$direccion2="";
			 if(isset($_POST["telefono1"])){
			 $telefono1=$_POST["telefono1"];
			 }
			 if(isset($_POST["telefono2"])){
			 $telefono2=$_POST["telefono2"];
			 }
			 if(isset($_POST["direccion1"])){
			 $direccion1=$_POST["direccion1"];
			 }
			 if(isset($_POST["direccion2"])){
			 $direccion2=$_POST["direccion2"];
			 }
						  $Usuario= 
						  array(
						  'nombreusu' => $_POST["nombre"],
						  'apellidousu' => $_POST["apellido"],
						  'correousu' => $correo,
						   'direccionusu' => $direccion1,
						  'direccion2usu' => $direccion2,
						  'telefonousu' => $telefono1,
						  'telefono2usu' => $telefono2,
						  'userusu'=>$_SESSION["Usuario"]->return->userusu,
						  'statususu' => "1"); 						 
					      $parametros=array('registroUsuario'=>$Usuario);
						$client->insertarUsuario($parametros);
						$sede=array('idsed'=> $_POST["sede"]);
						$rol=array('idrol'=>"6");
						$usuSede=array('idsed'=> $sede,'idrol'=> $rol);
						$RegUsuSede=array('registroUsuSede'=> $usuSede);
						$client->insertarUsuarioSedeXDefecto($RegUsuSede);
						javaalert("Se han Guardado los datos del Usuario");
						iraURL('../pages/inbox.php');		

						}else{
							javaalert("El formato del correo es incorrecto, por favor verifique");
						
						}
			 	
				
		}else{
			javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
		}
		
	  } 	
   include("../views/create_user.php");
  } catch (Exception $e) {
								javaalert('Error al crear el usuario');
								iraURL('../pages/inbox.php');
								}		
	 
?>
