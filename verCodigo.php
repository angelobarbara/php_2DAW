<?php
function seeCode($file){

	highlight_file($file);

}

function button(){

	echo("<form method='post'> <input type='submit' name='ver_codigo' target='blank' name='Submit' value='Ver Codigo'/>
			</form>");
}
?>
