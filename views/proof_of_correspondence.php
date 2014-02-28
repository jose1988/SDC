<?php
require_once("../pdf/dompdf/dompdf_config.inc.php");

$idpaq = $resultadoConsultarUltimoPaquete->return->idpaq;
$nombre = $resultadoConsultarUltimoPaquete->return->origenpaq->nombreusu;
$apellido = $resultadoConsultarUltimoPaquete->return->origenpaq->apellidousu;

$nombredes = $resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->nombreusu;
$direcciondes = $resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->direccionusu;
$telefonodes = $resultadoConsultarUltimoPaquete->return->destinopaq->idusubuz->telefonousu;

$sede = $resultadoConsultarSede->return->nombresed;

if(isset($resultadoConsultarUltimoPaquete->return)){

# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Comprobante de Correspondencia</title>
<link rel="stylesheet" href="../recursos/estilosPdf.css" type="text/css" />
</head>
<body>
<br>
<table align="center" width="500" border="0" >
  <tr>
    <td>
		<img src="../images/header-top-left.png" width="330" height="50">
   	  	<h2 align="center">Sistema de Correspondencia</h2>
		<h3 align="center">Comprobante de Paquete</h3>
    	<table width="500" border="0">
  		<tr>
    		<td><strong>Sede: </strong>'.$sede.'</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td><strong>Realizado por: </strong>'.$nombre.' '.$apellido.'</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td><strong>Nombre: </strong>'.$nombredes.'</td>
    		<td><strong>Dirección: </strong>'.' '.' '.' '.$direcciondes.'</td>
  		</tr>
  		<tr>
    		<td><strong>Teléfono: </strong>'.$telefonodes.'</td>
    		<td><strong>Lugar de Envio: </strong>'.$sede.'</td>
  		</tr>
  		<tr>
  		  <td colspan="2">&nbsp;</td>
		</tr>
		<tr>
  		  <td colspan="2">&nbsp;</td>
		</tr>
  		<tr>
  		  <td align="center"><strong>________________</strong></td>
          <td align="center"<strong>________________</strong></td>
		  </tr>
  		<tr>
  		  <td align="center"><strong>Usuario</strong></td>
          <td align="center"><strong>Recepción</strong></td>
		</tr>
	</table>
	</td>
  </tr>
 
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
  	<td>---------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>
		<img src="../images/header-top-left.png" width="330" height="50">
		<h2 align="center">Sistema de Correspondencia</h2>
		<h3 align="center">Comprobante de Paquete</h3>
    	<table width="500" border="0">
  		<tr>
    		<td><strong>Sede: </strong>'.$sede.'</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td><strong>Realizado por: </strong>'.$nombre.' '.$apellido.'</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
  		</tr>
  		<tr>
    		<td><strong>Nombre: </strong>'.$nombredes.'</td>
    		<td><strong>Dirección: </strong>'.' '.' '.' '.$direcciondes.'</td>
  		</tr>
  		<tr>
    		<td><strong>Teléfono: </strong>'.$telefonodes.'</td>
    		<td><strong>Lugar de Envio: </strong>'.$sede.'</td>
  		</tr>
  		<tr>
  		  <td colspan="2">&nbsp;</td>
		</tr>
		<tr>
  		  <td colspan="2">&nbsp;</td>
		</tr>
  		<tr>
  		  <td align="center"><strong>________________</strong></td>
          <td align="center"<strong>________________</strong></td>
		  </tr>
  		<tr>
  		  <td align="center"><strong>Usuario</strong></td>
          <td align="center"><strong>Recepción</strong></td>
		</tr>
	</table>
    </td>
  </tr>
</table> 
</body>
</html>
';

//Obtenemos el código html de la página web que nos interesa
$dompdf = new DOMPDF();
//Creamos una instancia a la clase
$dompdf->load_html($html);
//Esta línea es para hacer la página del PDF más grande
$dompdf->set_paper('carta','portrait');
$dompdf->render();
$nom = 'Comprobante de Correpondencia Numero '.$idpaq.'.pdf';
$dompdf->stream($nom);

}//Fin del IF general
?>