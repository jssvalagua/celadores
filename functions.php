<?php 
	
	function formatear($archivo) {

		// Abrimos el archivo
		$fp = fopen($archivo, "r");
		$numlinea = 1;
		$respuestas = 0;

		// Leemos el archivo linea a linea
		while ($linea = fgets($fp, filesize($archivo))) {
			$linea = trim($linea);
			// Si la linea esta vacia empezamos pregunta nueva con un div
			if(!$linea[1]) {
				// Si no es la primera linea del archivo cerramos el div
				if($numlinea!=1){
					echo '</div></div>';
				}
				echo '<div class="card"><div class="card-body">';
			// Si la linea no esta vacia la mostramos	
			}else{
				// Si el primer caracter de la linea es un guion, sera una respuesta
				if($linea[0]=="-") {
					if($respuestas==0) {
						echo '<ul>';
						$respuestas=1;
					}
					//unset($linea[0],$linea[1]);
					$linea = str_replace( "- ", "",$linea);
					echo '<li>'.$linea.'</li>';
				// Si no empieza con un guion no sera una respuesta
				}else{
					if($respuestas==1) {
						echo '</ul>';
						$respuestas=0;
					}
					
					// Esta es la lia que corresponde con la pregunta				
					echo '<h5 class="card-title">'.$linea.'</h5>';
				}
				
			} 

		    $numlinea++;
		}

		// Cerramos el archivo
		fclose($fp);
	}


	function leerArchivo($archivo) {

		// Abrimos el archivo
		$fp = fopen($archivo, "r");
		// Loop que parará al final del archivo, cuando feof sea true:
		while(!feof($fp)){
			echo fread($fp, 4092);
		} 
		fclose($fp);
	}


	function leerArchivoLinea($archivo) {

		//$archivo = "celadorex.txt";
		$fp = fopen($archivo, "r");
		//$contents = fgets($fp, filesize($archivo));
		while ($linea = fgets($fp, filesize($archivo))) {
			echo $numlinea;
		    echo trim($linea).'<br/>';
		    $aux[] = $linea;    
		    $numlinea++;
		}
		//echo var_dump($contents);
		//echo $contents. "<br />";
		fclose($fp);  
	}



?>