<?php
sleep(1);
if(isset($_REQUEST['correo']) && $_REQUEST['correo']!=""){
	
	if(preg_match('{^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$}',$_REQUEST['correo'])){
    		echo '<div align="center" id="Success">Correo Correcto</div>';
    	}
	else{			
			echo '<div align="center" id="Error">Correo Incorrecto</div>';
		}
}
?>