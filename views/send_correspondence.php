
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Seguros Horizonte | HorizonLine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- javascript -->
<script type="text/javascript" src="../js/jquery-1.9.1.js" ></script> 
        <script type='text/javascript' src="../js/bootstrap.js"></script>
        <script type='text/javascript' src="../js/bootstrap-transition.js"></script>
        <script type='text/javascript' src="../js/bootstrap-tooltip.js"></script>
        <script type='text/javascript' src="../js/modernizr.min.js"></script>
        <script type='text/javascript' src="../js/custom.js"></script>
        <script type='text/javascript' src="../js/jquery.fancybox.pack.js"></script>
<!-- javascript para el funcionamiento del calendario -->
<link rel="stylesheet" type="text/css" href="../js/ui-lightness/jquery-ui-1.10.3.custom.css" media="all" />
<script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.js" ></script> 
        <!-- styles -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/jquery.fancybox.css" rel="stylesheet">
        <!-- [if IE 7]>
          <link rel="stylesheet" href="font-awesome/css/font-awesome-ie7.min.css">
        <![endif]--> 

        <!--Load fontAwesome css-->
        <link rel="stylesheet" type="text/css" media="all" href="../font-awesome/css/font-awesome.min.css">
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- [if IE 7]>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link href="../css/footable-0.1.css" rel="stylesheet" type="text/css" />
        <link href="../css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
        <link href="../css/footable.paginate.css" rel="stylesheet" type="text/css" />
 <script>
  $(function() {
  
  diasFestivos = ["1/1","1/5","19/4","24/6","5/7","24/7","12/10","25/12","31/12"];

	$.datepicker.regional['es'] = {
	showButtonPanel: true,
	changeMonth: true,
changeYear: true,
		clearText: 'Limpiar', clearStatus: '',
		closeText: 'Cerrar', closeStatus: '',
		prevText: '&#x3c;Ant', prevStatus: '',
		prevBigText: '&#x3c;&#x3c;', prevBigStatus: '',
		nextText: 'Sig&#x3e;', nextStatus: '',
		nextBigText: '&#x3e;&#x3e;', nextBigStatus: '',
		currentText: 'Hoy', currentStatus: '',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		monthStatus: '', yearStatus: '',
		weekHeader: 'Sm', weekStatus: '',
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		dayStatus: 'DD', dateStatus: 'D, M d',
		dateFormat: 'dd/mm/yy', firstDay: 0, 
		initStatus: '', isRTL: false};
		$("#datepickerf").datepicker({
				constrainInput:true,
beforeShowDay:noFinesDeSemanaNiFestivos,
		});
		$("#datepicker").datepicker({
		minDate: 3,
		constrainInput:true,
beforeShowDay:noFinesDeSemanaNiFestivos,
		onClose: function (selectedDate) {
		  var date = $(this).datepicker('getDate');
            if (date) {
                  date.setDate(date.getDate() + 1);
            }
		$("#datepickerf").datepicker("option", "minDate", date);
		
		}
		});

	$.datepicker.setDefaults($.datepicker.regional['es']); 
	$.datepickerf.setDefaults($.datepicker.regional['es']); 

 
  });
  
  function noFinesDeSemanaNiFestivos(date){
var noWeekend=$.datepicker.noWeekends(date,diasFestivos);
noWeekend[2]='No se permite el ingreso de días de fin de semana';
return noWeekend[0]?festivo(date):noWeekend;
}


function festivo(date){
var m=date.getMonth(),d=date.getDate(),y=date.getFullYear();
for(i=0;i<diasFestivos.length;i++){
if($.inArray(d+'/'+(m+1),diasFestivos)!=-1){
return[false,"festivos",'No se permite el ingreso de días festivos'];
}
}
		 var pascua = CalculePascua(y,"GREGORIANO");
			 var MartesCarnavales=FechaRelativa(pascua.Dia-1,pascua.Mes,y,-46);
			   var juevesSanto=FechaRelativa(pascua.Dia-1,pascua.Mes,y,-2);
	
	//lunes carnavales
	if(d==(MartesCarnavales.Dia-1) && (m+1)==MartesCarnavales.Mes && y==MartesCarnavales.Ano ){		   	
return[false,"festivos",'No se permite el ingreso de días festivos'];
	}else if(d==MartesCarnavales.Dia && (m+1)==MartesCarnavales.Mes && y==MartesCarnavales.Ano){//martes carnavales
	return[false,"festivos",'No se permite el ingreso de días festivos'];
	}else if(d==juevesSanto.Dia && (m+1)==juevesSanto.Mes && y==juevesSanto.Ano){//jueves santo
	return[false,"festivos",'No se permite el ingreso de días festivos'];
	}else if(d==(juevesSanto.Dia+1) && (m+1)==juevesSanto.Mes && y==juevesSanto.Ano){ //viernes santo
	return[false,"festivos",'No se permite el ingreso de días festivos'];
	}
	
return[true,''];
}
  

function CalculePascua (Agno, Calendario) {

   if (Calendario == "GREGORIANO") {
      a=Agno%19
      b=Math.floor(Agno/100)
      c=Agno%100
      d=Math.floor(b/4)
      e=b%4
      f=Math.floor((b+8)/25)
      g=Math.floor((b-f+1)/3)
      h=(19*a+b-d-g+15)%30
      i=Math.floor(c/4)
      k=c%4
      l=(32+2*e+2*i-h-k)%7
      m=Math.floor((a+11*h+22*l)/451)
      p=(h+l-7*m+114)
      // Devuelve un registro Registro.Dia_Res / Registro.Mes_Res
      return {Dia : (p%31)+1, Mes : Math.floor(p/31)}
   } else if (calendario == "JULIANO") {
      // Para años anteriores a 1583 (Calendário Juliano):
      a = Agno % 4
      b = Agno % 7
      b = Agno % 19
      d = (19*c + 15) % 30
      e = (2*a + 4*b - d + 34) % 7
      f = Math.floor((d + e + 114) / 31)
      g = (d + e + 114) % 31
      // Devuelve un registro Registro.Dia_Res / Registro.Mes_Res
      return {Dia : g+1, Mes : f}
   } else return {Dia : 0, Mes : 0}
} // CalculePascua


  
function EsBisiesto (Agno) {
// Los cálculos del año bisiesto cambiam a partir de la reforma Gregoriana del 1582
// 1. A partir Octubre 15 de 1582, i.e. a partir de 1583 (año > 1583): 
//    Un año es bisiesto si es divisible por 4, excepto aquellos divisibles por 100 pero no por 400.
// 2. Antes de Octubre 4 de 1582, i.e. antes de 1581 (año < 1583): 
//    Un año es bisiesto si es divisible por 4.
   if (Agno%4 == 0) {
      if (Agno > 1583)
         if (Agno%100 == 0 && Agno%400 != 0) { return false }
      return true
   } else { return false }
} // Es bisiesto
    
function numDiasMes(mes,Agno){
// Devuelve la cantidad de Dias del mes
// 0 si ha error
   if (mes<1 || mes>12 || Agno<=0) {  return 0 }

   if(mes==2) { 
   // Si un año es bisiesto, Febrero tendrá 29 días y no 28
      if (EsBisiesto (Agno)) return 29;
      else return 28;
   } 
   else if (mes==7) { return 31 }
   else { return 30 +((mes % 7) % 2) }
} // numDiasMes



function FechaRelativa (Dia, Mes, Agno, DiferenciaDias) {

// Devuelve un registro con dos enteros con una fecha relativa a la 
// Pascua (Resurrección), sumando (en forma positiva o negativa) 
// una cantidad de dias

   var ndiasmes=0;

   if (DiferenciaDias == 0) return {Dia:Dia,Mes:Mes,Ano:Agno}
 
   if (DiferenciaDias > 0) {
      Dia++;  
      // Avanza mes tras mes hasta llegar a la fecha relativa
      while (DiferenciaDias>0) {
         ndiasmes = numDiasMes(Mes,Agno);
         if (DiferenciaDias > ndiasmes - Dia + 1) {
            if (Mes < 12) { Mes++; }
            else { Mes=1; Agno++; }
            DiferenciaDias -= ndiasmes - Dia + 1;
            Dia = 1;
         } else { 
            Dia += DiferenciaDias - 1;
            DiferenciaDias = -1;
         }
      } // end while
   } // Endif
   else { // DiferenciaDias > 0
      DiferenciaDias *= -1;
      while (DiferenciaDias>0) {
         if (DiferenciaDias >= Dia) {
            if (Mes > 1) {Mes--}
            else { Mes=12; Agno-- }
            // dias del mes anterior
            DiferenciaDias -= Dia;
            ndiasmes = numDiasMes(Mes,Agno)
            Dia = ndiasmes;
         } else { 
            Dia -= DiferenciaDias;
            DiferenciaDias = -1;
         }
      } // end while
   } // End else

   return {Dia : Dia, Mes : Mes, Ano : Agno}
} // FechaRelativa



  </script>
		</head>

    <body class="appBg">
        <div id="header">
            <div class="container header-top-top hidden-phone">
                <img alt="" src="../images/header-top-top-left.png" class="pull-left">
                <img alt="" src="../images/header-top-top-right.png" class="pull-right">
            </div>
            <div class="header-top">
                <div class="container">
                    <img alt="" src="../images/header-top-left.png" class="pull-left">
                    <div class="pull-right">
                    </div>
                </div>
                <div class="filter-area">
                    <div class="container">
                        <span lang="es">&nbsp;</span></div>
                </div>
            </div>
        </div>

        <div class="container app-container">
            <div>
                    <ul class="nav nav-pills">
                        <li class="pull-left">
                            <div class="modal-header">
                                <h3> Correspondencia    
                                    <span>SH</span> <?php echo "- Hola, ".$_SESSION["Usuario"]->return->nombreusu;?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">				
                                            <span class="icon-cog" style="color:rgb(255,255,255)"> </span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="../pages/edit_user.php">Editar Usuario</a></li>
                                            <li class="divider"></li>
                                            <li><a href="../index.php">Salir</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Ayuda</a></li>
                                        </ul>
                                    </div>
                                </h3>
                            </div>
                        </li>
                    </ul>
                </div>
            <!--Caso pantalla uno-->
			 <form method="post" ENCTYPE="multipart/form-data" id="formu">
            <div class="row-fluid">
                <div class="span2">
                    <ul class="nav nav-pills nav-stacked">
                        <li> <a href="inbox.php">Atrás</a> <li>
                        <li> <a href="create_mailbox.php">Crear buzón</a> <li>
                        <li> <a href="create_external_mailbox.php">Crear buzón externo</a> <li>
                    </ul>
                </div>

                <div class="span10">
                    <div class="tab-content" id="Correspondecia">
                        <table> 
                            <tr>
                                <td>Para:</td><td>
								<input id="contacto" name="contacto" type="text"  list="suggests" maxlength="24" style="width:800px ;height:28px" size="100"  title="Ingrese el nombre de usuario" autocomplete="off"   autofocus required>								
									<datalist id="suggests">
									<?php 
									if(count($rowContactos->return)==1){
									echo '<option value="'.$rowContactos->return->idusubuz->userusu.'">';
									}else{
									for($i=0;$i<count($rowContactos->return);$i++){
									echo '<option value="'.$rowContactos->return[$i]->idusubuz->userusu.'">';
									}
									}
									
									?>
									</datalist>
								</td>
						   </tr>
                            <tr>
                                <td>Asunto:</td><td><input type="text" id="asunto" name="asunto" maxlength="24"  size="100" style="width:800px" title="Ingrese el asunto" autocomplete="off"  required><br></td>
                            </tr>
                            <tr>
                                <td>Tipo Doc:</td><td><select name="doc" required  title="Seleccione el tipo de documento">
								   <option value="" style="display:none">Seleccionar:</option>

								    <?php 
									if(count($rowDocumentos->return)==1){
								    echo '<option value="'.$rowDocumentos->return->iddoc.'">'.$rowDocumentos->return->nombredoc.'</option>';

									}else{
									for($i=0;$i<count($rowDocumentos->return);$i++){
									echo '<option value="'.$rowDocumentos->return[$i]->iddoc.'">'.$rowDocumentos->return[$i]->nombredoc.'</option>';
									}
									}
									
									?>
       
                                    </select><br></td>
                            </tr>
                            <tr>
                                <td>Prioridad:</td><td><select name="prioridad" required  title="Seleccione la prioridad">
								<option value="" style="display:none">Seleccionar:</option>                                  
								  <?php 
								  if(count($rowPrioridad->return)==1){
								  	echo '<option value="'.$rowPrioridad->return->idpri.'">'.$rowPrioridad->return->nombrepri.'</option>';

								  }else{
								  for($i=0;$i<count($rowPrioridad->return);$i++){
									echo '<option value="'.$rowPrioridad->return[$i]->idpri.'">'.$rowPrioridad->return[$i]->nombrepri.'</option>';
									}
								  }
									
									?>
                                    </select><br></td>
                            </tr>
                            <tr>
                                <td></td><td>
								Fecha de alerta:<input type="text" id="datepicker" name="datepicker" autocomplete="off" style="width:100px" title="Seleccione la fecha de alerta" required/> 
					        	Fecha de límite:<input type="text" id="datepickerf" name="datepickerf" autocomplete="off" style="width:100px" title="Seleccione la fecha límite" required/>
								<br></td>
                            </tr>
                            <tr>
                                <td>Imagen (opcional):</td><td>
										<input id="imagen" name="imagen" type="file" maxlength="199" onBlur='LimitAttach(this);'/>
                                </td>
                            </tr>
                            <tr>
                             <td>Su mensaje: </td><td><textarea  rows="10" cols= "23" id="elmsg" name="elmsg" maxlength="499"  style="width:800px" title="Ingrese un comentario" required>Su comentario...</textarea><br></td>
                            </tr>
							<tr>
                             <td>Con Respuesta: </td><td><input type="checkbox" name="rta" id="rta" title="Seleccione si desea con respuesta" checked="checked"></td>
                            </tr>
                            <tr>          
                                <td colspan="2" align="right"><input type="submit" id="enviar"  onclick="return confirm('¿Esta seguro que desea enviar la correspondencia? \n Luego de enviado no podrá modificar la correspondencia')" value="Enviar Correspondecia" name="enviar"><br>
                                </td>
                            </tr>
							
                        </table>
                    </div>
                </div>
            </div>
 </form>
            <!-- /container -->
            <div id="footer" class="container">    	
            </div>

        </div>
			 <script>
      window.onload = function(){
			killerSession();}
             function killerSession(){
             setTimeout("window.open('../recursos/cerrarsesion.php','_top');",300000);
             }
   </script>
        <script>
function LimitAttach(tField) { 
file=imagen.value; 

extArray = new Array(".gif",".jpg",".png"); 

allowSubmit = false; 
if (!file) return; 
while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1); 
ext = file.slice(file.indexOf(".")).toLowerCase(); 
for (var i = 0; i < extArray.length; i++) { 
if (extArray[i] == ext) { 
allowSubmit = true; 
break; 
} 
} 
if (allowSubmit) { 
} else { 
tField.value=""; 
alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione un nuevo archivo"); 
} 
}  
        </script>
    </body>
</html>