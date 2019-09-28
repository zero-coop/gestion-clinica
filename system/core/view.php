<?php

	class View {
		function __construct(){
			//echo 'VISTA BASE';	
		}

		function render($clase, $param = null){

			require PATH_VIEWS . "{$clase}/{$clase}.php";
		}

		// function render($clase){
		// 	if(is_file(PATH_VIEWS . "{$clase}/{$clase}.php")){
		// 		return require PATH_VIEWS . "{$clase}/{$clase}.php";
		// 		return require PATH_VIEWS . "{$clase}/static/index.css";
		// 	}
		// }
	}
?>