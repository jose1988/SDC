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
<body class="appBg">


	 <?php
	 session_start();
	 include("../recursos/funciones.php");
require_once('../lib/nusoap.php');
  $aux= $_POST['idban'];
$wsdl_url = 'http://localhost:15362/SistemaDeCorrespondencia/CorrespondeciaWS?WSDL';
  $client = new SOAPClient($wsdl_url);
  $client->decode_utf8 = false; 
  $Usuario= array('user' => $_SESSION["Usuario"]->return->idusu, 'ban' => $aux);
  $Bandeja = $client->consultarPaquetesXBandeja($Usuario,$aux);
  $reg=0;
  if(isset($Bandeja->return)){
  $reg=count($Bandeja->return);
  }else{
	$reg=0;  
  }
  // echo '<pre>';
 //	print_r( $Bandeja );
	
 // echo '<pre>';
          
          echo "<h2> <strong>".$aux."</h2> </strong>";
          
		  
		  
   if($reg!=0){        
           
          echo "</div>";
		  
		 
       echo "<br>";
	echo "<table class='footable table table-striped table-bordered' align='center' data-page-size='10'>
    	<thead bgcolor'#FF0000'>
			<tr>
				
            	<th style='width:7%; text-align:center''>De</th>
                <th style='width:7%; text-align:center''>Para</th>
				<th style='width:7%; text-align:center''>Asunto </th>
				 <th style='width:7%; text-align:center''>Fecha</th>
            </tr>
		</thead>
        <tbody>
        	<tr>";
			if($reg>1){
				$j=0;
				while($j<$reg){ 
                	
                    echo "<td  style='text-align:center'>".$Bandeja->return[$j]->origenpaq."</td>";
					echo "<td style='text-align:center'>".$Bandeja->return[$j]->destinopaq."</td>";
					echo "<td style='text-align:center'>".$Bandeja->return[$j]->asuntopaq."</td>";
                    echo "<td style='text-align:center'>".substr($Bandeja->return[$j]->fechapaq,0,10)."</td>";                                   
            echo "</tr>";
					$j++;
				} 
			}else{  
					echo "<td style='text-align:center'>".$Bandeja->return->origenpaq."</td>";
					echo "<td style='text-align:center'>".$Bandeja->return->destinopaq."</td>";
					echo "<td style='text-align:center'>".$Bandeja->return->asuntopaq."</td>";
                    echo "<td style='text-align:center'>".substr($Bandeja->return->fechapaq,0,10)."</td>";
                echo "</tr>";
			}
	echo " </tbody>
  	</table>";
	echo '<ul id="pagination" class="footable-nav"><span>Pag:</span></ul>';
	
	}else {
		echo "<br>";
		echo"<div class='alert alert-block' align='center'>
			<h2 style='color:rgb(255,255,255)' align='center'>Atención</h2>
			<h4 align='center'>No hay Paquetes en Bandeja </h4>
		</div> ";
	}
	
    
  ?>  
 

<script src="../js/footable.js" type="text/javascript"></script>
<script src="../js/footable.paginate.js" type="text/javascript"></script>
<script src="../js/footable.sortable.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    $(function() {
      $('table').footable();
    });
  </script> 
	</div>
	
    <!-- /container -->
	<div id="footer" class="container">    	
	</div>

    
 </div>

