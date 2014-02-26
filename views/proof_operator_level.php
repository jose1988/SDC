<?php
require_once("../pdf/dompdf/dompdf_config.inc.php");
$htmlUno = "";
$htmlDos = "";
$htmlTres = "";
$htmlCuatro = "";
$htmlCinco = "";

# Contenido HTML del documento que queremos generar en PDF.
if($contadorPaquetes>0){
$htmlUno = '
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
   	  	<h2 align="center">Operador Nivel 1</h2>
		<h3 align="center">Listado de Paquetes</h3>
    	<table width="500" border="1" id="borde">
			<tr>
    			<td><strong>Origen</strong></td>
    			<td><strong>Destino</strong></td>
    			<td><strong>Dirección</strong></td>
				<td><strong>Teléfono</strong></td>
  			</tr>';
		
	for($i=0; $i<$contadorPaquetes; $i++){
	  		$htmlDos = $htmlDos.'<tr>
    		<td>'.$origen[$i].'</td>
    		<td>'.$destino[$i].'</td>
    		<td>'.$direccion[$i].'</td>
			<td>'.$telefono[$i].'</td>
  		</tr>';		
	}
		
		$htmlTres = '</table>
		<table width="500" border="0">
		<tr>
  		  <td colspan="4">&nbsp;</td>
		</tr>
  		<tr>
  		  <td colspan="2" align="center"><strong>________________</strong></td>
          <td colspan="2" align="center"><strong>________________</strong></td>
		  </tr>
  		<tr>
  		  <td colspan="2" align="center"><strong>Usuario</strong></td>
          <td colspan="2" align="center"><strong>Recepción</strong></td>
		</tr>
	</table>
	</td>
  </tr>
  
  <tr>
  	<td>&nbsp;</td>
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
  	<td>&nbsp;</td>
  </tr>
  
  <tr>
  	<td>
		<img src="../images/header-top-left.png" width="330" height="50">
   	  	<h2 align="center">Operador Nivel 1</h2>
		<h3 align="center">Listado de Paquetes</h3>
		<table width="500" border="1" id="borde">
			<tr>
    			<td><strong>Origen</strong></td>
    			<td><strong>Destino</strong></td>
    			<td><strong>Dirección</strong></td>
				<td><strong>Teléfono</strong></td>
  			</tr>';
		
	for($i=0; $i<$contadorPaquetes; $i++){
	  		$htmlCuatro = $htmlCuatro.'<tr>
    		<td>'.$origen[$i].'</td>
    		<td>'.$destino[$i].'</td>
    		<td>'.$direccion[$i].'</td>
			<td>'.$telefono[$i].'</td>
  		</tr>';		
	}
		
		$htmlCinco = '</table>
		<table width="500" border="0">
		<tr>
  		  <td colspan="4">&nbsp;</td>
		</tr>
  		<tr>
  		  <td colspan="2" align="center"><strong>________________</strong></td>
          <td colspan="2" align="center"><strong>________________</strong></td>
		  </tr>
  		<tr>
  		  <td colspan="2" align="center"><strong>Usuario</strong></td>
          <td colspan="2" align="center"><strong>Recepción</strong></td>
		</tr>
	</table>
	</td>
  </tr>
  
</table> 
</body>
</html>
';
}
$html = $htmlUno.$htmlDos.$htmlTres.$htmlCuatro.$htmlCinco;

//Obtenemos el código html de la página web que nos interesa
$dompdf = new DOMPDF();
//Creamos una instancia a la clase
$dompdf->load_html($html);
//Esta línea es para hacer la página del PDF más grande
$dompdf->set_paper('carta','portrait');
$dompdf->render();
$dompdf->stream("Comprobante de Nivel.pdf");
?>