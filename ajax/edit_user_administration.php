<?php
session_start();
include("../recursos/funciones.php");
require_once('../lib/nusoap.php');

if (!isset($_SESSION["Usuario"])) {
    iraURL("../index.php");
} elseif (!usuarioCreado()) {
    iraURL("../pages/create_user.php");
}

if ($_SESSION["Usuario"]->return->tipousu != "1" && $_SESSION["Usuario"]->return->tipousu != "2") {
    iraURL('../pages/inbox.php');
}

$usuarioBitacora = $_SESSION["Usuario"]->return->idusu;
$sede = $_SESSION["Sede"]->return->idsed;

try {
    $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
    $client = new SOAPClient($wsdl_url);
    $client->decode_utf8 = false;

    if ($_POST["idUsu"] != "" && $_POST["user"] != "" && $_POST["nombre"] != "" && $_POST["apellido"] != "" && $_POST["correo"] != "") {
        $idUsu = $_POST["idUsu"];
        $user = $_POST["user"];
        $telefono1 = "";
        $telefono2 = "";
        $direccion1 = "";
        $direccion2 = "";
        if ($_POST["telefono1"] != "") {
            $telefono1 = $_POST["telefono1"];
        }
        if ($_POST["telefono2"] != "") {
            $telefono2 = $_POST["telefono2"];
        }
        if ($_POST["direccion1"] != "") {
            $direccion1 = $_POST["direccion1"];
        }
        if ($_POST["direccion2"] != "") {
            $direccion2 = $_POST["direccion2"];
        }
        if (preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}', $_POST["correo"])) {
            $correo = $_POST["correo"];
            $registroUsu = array(
                'idusu' => $idUsu,
                'nombreusu' => $_POST["nombre"],
                'apellidousu' => $_POST["apellido"],
                'correousu' => $correo,
                'direccionusu' => $direccion1,
                'direccion2usu' => $direccion2,
                'telefonousu' => $telefono1,
                'telefono2usu' => $telefono2,
                'userusu' => $user);
            $registroU = array('registroUsuario' => $registroUsu);
            $guardo = $client->editarUsuario($registroU);
            if ($guardo->return == 0) {
                javaalert("No se han Guardado los datos del Usuario");
            } else {
                javaalert("Se han Guardado los datos del Usuario");
                llenarLog(9, "Edición de Usuario en Administración", $usuarioBitacora, $sede);
            }
            iraURL('../pages/administration.php');
        }
    } else {
        javaalert("Debe agregar todos los campos obligatorios, por favor verifique");
    }
} catch (Exception $e) {
    javaalert('Lo sentimos no hay conexión');
    iraURL('../pages/inbox.php');
}
?>