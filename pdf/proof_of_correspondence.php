<?php

if ($usuarioBitacora == "") {
    echo '<script language="javascript"> window.location = "../pages/inbox.php"; </script>';
}
$idpaq = $resultadoConsultarUltimoPaquete->return->idpaq;

if (isset($resultadoConsultarUltimoPaquete->return->idpaqres->idpaq)) {
    $idpaqres = $resultadoConsultarUltimoPaquete->return->idpaqres->idpaq;
} else {
    $idpaqres = "";
}

$nombre = $resultadoConsultarUltimoPaquete->return->origenpaq->nombreusu;

if (isset($resultadoConsultarUltimoPaquete->return->origenpaq->apellidousu)) {
    $apellido = $resultadoConsultarUltimoPaquete->return->origenpaq->apellidousu;
} else {
    $apellido = "";
}

if (isset($resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->nombreusu)) {
    $nombredes = $resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->nombreusu;
} else {
    $nombredes = "";
}

if (isset($resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->direccionusu)) {
    $direcciondes = $resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->direccionusu;
} else {
    $direcciondes = "";
}

if (isset($resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->telefonousu)) {
    $telefonodes = $resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->telefonousu;
} else {
    $telefonodes = "";
}

if (isset($resultadoConsultarSede->return->nombresed)) {
    $sede = $resultadoConsultarSede->return->nombresed;
} else {
    $sede = "";
}

if (isset($resultadoConsultarUltimoPaquete->return)) {
    ob_start();
    include("../template/proof_of_correspondence.php");

    //Almacenar el resultado de la salida en una variable
    $page = ob_get_contents();

    //Limpiar buffer de salida hasta este punto
    ob_end_clean();

    require_once("../dompdf/dompdf_config.inc.php");

    //Obtenemos el código html de la página web que nos interesa
    $dompdf = new DOMPDF();
    //Creamos una instancia a la clase
    $dompdf->load_html($page);
    //Esta línea es para hacer la página del PDF más grande
    $dompdf->set_paper('carta', 'portrait');
    $dompdf->render();
    $nom = 'Comprobante de Correspondencia Numero ' . $idpaq . '.pdf';
    $dompdf->stream($nom);
}//Fin del IF general
?>