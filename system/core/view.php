<?php

	class View {
		function __construct(){
			//echo 'VISTA BASE';	
		}
		function render($clase){
			require PATH_VIEWS . "{$clase}/{$clase}.php";
		}
	}
?>