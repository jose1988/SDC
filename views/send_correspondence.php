<?php
if (!isset($rowPrioridad->return)) {
    echo '<script language="javascript"> window.location = "../pages/inbox.php"; </script>';
}
?>
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
        <script type="text/javascript" src="../js/calendarioValidado.js" ></script> 
      <!-- styles -->
        <link rel="shortcut icon" href="../images/faviconsh.ico">
       
       
        <link rel="shortcut icon" href="../images/faviconsh.ico">
       
        <link href="css/bootstrap.css" rel="stylesheet">
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

        <div id="middle">
            <div class="container app-container">
                <div>
                    <ul class="nav nav-pills">
                        <li class="pull-left">
                            <div class="modal-header" style="width:1135px;">
                                <h3> Correspondencia    
                                    <span>SH</span> <?php echo "- Hola, " . $_SESSION["Usuario"]->return->nombreusu; ?>
                                    <div class="btn-group  pull-right">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"> <span class="icon-cog" style="color:rgb(255,255,255)"> Configuracion </span> </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="../pages/view_user.php">Cuenta</a></li>
                                            <li class="divider"></li>
                                            <?php if ($_SESSION["Usuario"]->return->tipousu == "1" || $_SESSION["Usuario"]->return->tipousu == "2") { ?>
                                                <li><a href="../pages/administration.php">Administracion</a></li>
                                                <li class="divider"></li>
                                            <?php } ?>
                                            <li><a href="../recursos/cerrarsesion.php" onClick="">Salir</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Ayuda</a></li>
                                        </ul>
                                    </div>   

                                    <span class="divider pull-right" style="color:rgb(255,255,255)"> | </span>
                                    <div class="btn-group  pull-right">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"> <span class="icon-th-large" style="color:rgb(255,255,255)"> Operaciones </span> </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php if ($SedeRol->return->idrol->idrol == "1" || $SedeRol->return->idrol->idrol == "3") { ?>
                                                <li><a href="operator_level.php" > Recibir Paquete</a></li>
                                                <li class="divider"></li>
<?php }
if ($SedeRol->return->idrol->idrol == "2" || $SedeRol->return->idrol->idrol == "5") {
    ?>
                                                <li><a href="headquarters_operator.php" > Recibir Paquete</a></li>

                                            <?php }
                                            if ($SedeRol->return->idrol->idrol == "4" || $SedeRol->return->idrol->idrol == "5") {
                                                ?>
                                                <li class="divider"></li>
                                                <li><a href="create_valise.php" > Crear Valija</a></li>
                                                <li class="divider"></li>
                                                <li><a href="breakdown_valise.php" > Recibir Valija</a></li>
                                                <li class="divider"></li>
                                                <li><a href="reports_valise.php" > Estadisticas Valija</a></li>
                                                <li class="divider"></li>
                                            <?php }
                                            ?>
                                            <li><a href="reports_user.php" > Estadisticas Usuario</a></li>

                                        </ul>
                                    </div>
                                    <span class="divider pull-right" style="color:rgb(255,255,255)"> | </span>
                                    <div class="btn-group  pull-right">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"> <span class="icon-exclamation-sign" style="color:rgb(255,255,255)"> Alertas </span> </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="../pages/package_overdue_origin.php">Paquetes Enviados</a></li>
                                            <li class="divider"></li>
                                            <li><a href="../pages/package_overdue_destination.php">Paquetes Recibidos</a></li>

<?php if ($SedeRol->return->idrol->idrol == "4" || $SedeRol->return->idrol->idrol == "5") { ?>
                                                <li class="divider"></li>
                                                <li><a href="../pages/suitcase_overdue_origin.php">Valijas Enviadas</a></li>
                                                <li class="divider"></li>
                                                <li><a href="../pages/suitcase_overdue_destination.php"> Valijas Recibidas </a></li>
                                                <li class="divider"></li>
<?php } ?>
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
                                <li> <a href="inbox.php">Atrás</a> </li>
                                <li> <a href="create_mailbox.php">Crear buzón</a> </li>
                            </ul>
                        </div>

                        <div class="span10">
                            <div class="tab-content" id="Correspondecia">
                                <table> 
<?php
if (!isset($rowContactos->return)) {
    ?> 
                                        <tr>
                                            <td>Para:</td><td>
                                                <input id="contacto" name="contacto" type="text"  list="suggests" maxlength="199" style="width:800px ;height:28px" size="100"  autocomplete="off"  disabled  required>								
                                            </td>
                                        </tr>
    <?php
} else {
    ?>
                                        <tr>
                                            <td>Para:</td><td>
                                                <input id="contacto" name="contacto" type="text"  list="suggests" maxlength="199" style="width:800px ;height:28px" size="100"  title="Ingrese el nombre de usuario" autocomplete="off"   autofocus required>								
                                                <datalist id="suggests">
                                        <?php
                                        if (count($rowContactos->return) == 1) {
											if( $rowContactos->return->tipobuz=="0"){
											  echo '<option value="' . $rowContactos->return->idusubuz->userusu . '">';
											}else{
											echo '<option value="' . $rowContactos->return->nombrebuz. '">';
											}
                                          
                                        } else {
                                            for ($i = 0; $i < count($rowContactos->return); $i++) {
											if( $rowContactos->return[$i]->tipobuz=="0"){
											 echo '<option value="' . $rowContactos->return[$i]->idusubuz->userusu . '">';
											}else{
											echo '<option value="' . $rowContactos->return[$i]->nombrebuz. '">';
											}
                                               
                                            }
                                        }
                                        ?>
                                                </datalist>
                                            </td>
                                        </tr>
                                                    <?php
                                                }
                                                ?> 
                                    <tr>
                                        <td>Asunto:</td><td><input type="text" id="asunto" name="asunto" maxlength="199"  size="100" style="width:800px" title="Ingrese el asunto" autocomplete="off"  required><br></td>
                                    </tr>
                                    <tr>
                                        <td>Tipo Doc:</td><td><select name="doc" required  title="Seleccione el tipo de documento">
                                                <option value="" style="display:none">Seleccionar:</option>

<?php
if (count($rowDocumentos->return) == 1) {
    echo '<option value="' . $rowDocumentos->return->iddoc . '">' . $rowDocumentos->return->nombredoc . '</option>';
} else {
    for ($i = 0; $i < count($rowDocumentos->return); $i++) {
        echo '<option value="' . $rowDocumentos->return[$i]->iddoc . '">' . $rowDocumentos->return[$i]->nombredoc . '</option>';
    }
}
?>

                                            </select><br></td>
                                    </tr>
                                    <tr>
                                        <td>Prioridad:</td><td><select name="prioridad" required  title="Seleccione la prioridad">
                                                <option value="" style="display:none">Seleccionar:</option>                                  
                                                <?php
                                                if (count($rowPrioridad->return) == 1) {
                                                    echo '<option value="' . $rowPrioridad->return->idpri . '">' . $rowPrioridad->return->nombrepri . '</option>';
                                                } else {
                                                    for ($i = 0; $i < count($rowPrioridad->return); $i++) {
                                                        echo '<option value="' . $rowPrioridad->return[$i]->idpri . '">' . $rowPrioridad->return[$i]->nombrepri . '</option>';
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
                                        <td>Su mensaje: </td><td><textarea  rows="10" cols= "23" id="elmsg" name="elmsg" maxlength="1999"  style="width:800px" title="Ingrese un comentario" required>Su comentario...</textarea><br></td>
                                    </tr>
                                    <tr>
                                        <td>Con Respuesta: </td><td><input type="checkbox" name="rta" id="rta" title="Seleccione si desea con respuesta" checked="checked"></td>
                                    </tr>
<?php
if (!isset($rowContactos->return)) {
    ?> 
                                        <tr>          
                                            <td colspan="2" align="right"><input disabled type="submit" id="enviar"  onclick="return confirm('¿Esta seguro que desea enviar la correspondencia? \n Luego de enviado no podrá modificar la correspondencia')" value="Enviar Correspondecia" name="enviar"><br>
                                            </td>
                                        </tr>
    <?php
} else {
    ?>
                                        <tr>          
                                            <td colspan="2" align="right"><input type="submit" id="enviar"  onclick="return confirm('¿Esta seguro que desea enviar la correspondencia? \n Luego de enviado no podrá modificar la correspondencia')" value="Enviar Correspondecia" name="enviar"><br>
                                            </td>
                                        </tr>
    <?php
}
?> 
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
                                                window.onload = function() {
                                                    killerSession();
                                                }
                                                function killerSession() {
                                                    setTimeout("window.open('../recursos/cerrarsesion.php','_top');", 300000);
                                                }
            </script>
            <script>
                function LimitAttach(tField) {
                    file = imagen.value;

                    extArray = new Array(".gif", ".jpg", ".png");

                    allowSubmit = false;
                    if (!file)
                        return;
                    while (file.indexOf("\\") != - 1)
                        file = file.slice(file.indexOf("\\") + 1);
                    ext = file.slice(file.indexOf(".")).toLowerCase();
                    for (var i = 0; i < extArray.length; i++) {
                        if (extArray[i] == ext) {
                            allowSubmit = true;
                            break;
                        }
                    }
                    if (allowSubmit) {
                    } else {
                        tField.value = "";
                        alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione un nuevo archivo");
                    }
                }
            </script>
    </body>
</html>