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

if (isset($_POST['usu']) && $_POST['usu'] != "" && $_POST['usu'] != NULL) {
    try {
        $user = $_POST['usu'];
        $wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
        $client = new SOAPClient($wsdl_url);
        $client->decode_utf8 = false;
        $UsuarioRol = array('idusu' => $_SESSION["Usuario"]->return->idusu, 'sede' => $_SESSION["Sede"]->return->nombresed);
        $SedeRol = $client->consultarSedeRol($UsuarioRol);
        $usuario = array('user' => $user);
        $Usuario = $client->consultarUsuarioXUser($usuario);
        $idUsu = $Usuario->return->idusu;
    } catch (Exception $e) {
        javaalert('Lo sentimos no hay conexión');
        iraURL('../pages/inbox.php');
    }
    ?>
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
    <?php
    $apellido = "";
    $correo = "";
    $telefono1 = "";
    $telefono2 = "";
    $direccion1 = "";
    $direccion2 = "";
    if (isset($Usuario->return->apellidousu)) {
        $apellido = $Usuario->return->apellidousu;
    }
    if (isset($Usuario->return->correousu)) {
        $correo = $Usuario->return->correousu;
    }
    if (isset($Usuario->return->telefonousu)) {
        $telefono1 = $Usuario->return->telefonousu;
    }
    if (isset($Usuario->return->telefono2usu)) {
        $telefono2 = $Usuario->return->telefono2usu;
    }
    if (isset($Usuario->return->direccionusu)) {
        $direccion1 = $Usuario->return->direccionusu;
    }
    if (isset($Usuario->return->direccion2usu)) {
        $direccion2 = $Usuario->return->direccion2usu;
    }
    ?>
    <form id="formulario" method="post">
        <h2> Datos del Usuario </h2> 
        <table class='footable table table-striped table-bordered'>
            <tr>
                <td style="text-align:center" >Nombre</td>
                <td style="text-align:center"><input type="text" name="nombre" id="nombre" autocomplete="off" value="<?php echo $Usuario->return->nombreusu; ?>" maxlength="150" size="30"  autofocus required></td>
            </tr>
            <tr>
                <td style="text-align:center">Apellido</td>
                <td style="text-align:center"><input type="text" name="apellido" id="apellido" autocomplete="off" value="<?php echo $apellido; ?>" maxlength="150" size="30"  ></td>
            </tr>
            <tr>
            	<td style="text-align:center" width="50%">Correo</td>
            	<td style="text-align:center"><input type="email" name="correo" id="correo" autocomplete="off" value="<?php echo $correo; ?>" maxlength="100" size="50" ></td>
            </tr>
            <tr>
                <td style="text-align:center" width="50%">Usuario</td>
                <td style="text-align:center"><input type="text" name="usuario" id="usuario"  value="<?php echo $Usuario->return->userusu; ?>" size="30"   disabled></td>		
            </tr>
            <tr>
                <td style="text-align:center">Teléfono 1</td>
                <td style="text-align:center"><input type="tel" name="telefono1" id="telefono1" autocomplete="off" value="<?php echo $telefono1; ?>" maxlength="50" size="30"    ></td>
            </tr>
            <tr>
                <td style="text-align:center">Teléfono 2</td>
                <td style="text-align:center"><input type="tel" name="telefono2" id="telefono2" autocomplete="off" value="<?php echo $telefono2; ?>" maxlength="50" size="30"  ></td>
            </tr>
            <tr>
                <td style="text-align:center">Dirección 1</td>
                <td style="text-align:center"><textarea style="width:500px;"   id="direccion1" name="direccion1"  maxlength="2000" style="width:800px"><?php echo $direccion1; ?></textarea></td>
            </tr>
            <tr>
                <td style="text-align:center">Dirección 2</td>
                <td style="text-align:center"><textarea style="width:500px;" id="direccion2" name="direccion2" maxlength="2000" style="width:800px"><?php echo $direccion2; ?></textarea></td>
            </tr>
        </table>
        <br>
        <div class="span11" align="center"><button class='btn' id='crear' onClick='confirmar();' name='crear' type='button'>Guardar</button></div>
        <br>
    </form>
    <script>
            window.onload = function() {
                killerSession();
            }
            function killerSession() {
                setTimeout("window.open('../recursos/cerrarsesion.php','_top');", 300000);
            }
    </script>
    
    <script language="Javascript">
    		function confirmar() {
            	confirmar = confirm("¿Esta seguro que desea guardar los cambios?");
                	if (confirmar) {
                    	editar();
					}
          	}
	</script>

    <script language="JavaScript">
        function editar() {
            var idUsu = '<?= $idUsu ?>';
            var user = document.forms.formulario.usuario.value;
            var nombre = document.forms.formulario.nombre.value;
            var apellido = document.forms.formulario.apellido.value;
            var correo = document.forms.formulario.correo.value;
            var telefono1 = document.forms.formulario.telefono1.value;
            var telefono2 = document.forms.formulario.telefono2.value;
            var direccion1 = document.forms.formulario.direccion1.value;
            var direccion2 = document.forms.formulario.direccion2.value;
            $.ajax({
                type: "POST",
                url: "../ajax/edit_user_administration.php",
                data: {'idUsu': idUsu,
                    'user': user,
                    'nombre': nombre,
                    'apellido': apellido,
                    'correo': correo,
                    'telefono1': telefono1,
                    'telefono2': telefono2,
                    'direccion1': direccion1,
                    'direccion2': direccion2},
                dataType: "text",
                success: function(response) {
                    $("#datos").html(response);
                }
            });
        }
    </script>
    <?php
} else {
    javaalert('Debe ingresar el User del Usuario');
    iraURL('../pages/edit_user_administration.php');
}?>