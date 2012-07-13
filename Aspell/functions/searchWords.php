<?php
	// Asumo que el servidor está configurado para mostrar los 
	// directorios y que la propiedad "allow_url_fopen" està activa	

	//Se obtiene la url donde se efectuará la busqueda.
	$dir = $_REQUEST["url"];

	//Se incluye el diccionario en Ingles del Aspell.
	$pspell_link = pspell_new("en");

	//Llamada a la funcion. 
	getFilesFromDirectory($dir);

	// Función que ejecuta la busaqueda de palabras en los archivos del directorio.
	function getFilesFromDirectory($direct){
	    //Arreglo con las extensiones de archivos en los que se buscará.		
		$validExt = array("haml");

		//Se obtiene el directorio del objeto actual. 
		$directories = scandir($direct);		
		foreach($directories as $files){
			if(($files == '.') || ($files == '..')){
			}elseif(is_dir($direct.'/'.$files)){
				//Si el objeto en el que estamos posicionados es una carpeta, recursivamente se llama a la función.
				getFilesFromDirectory($direct.'/'.$files);
			}else{
				//Lectura de los archivos incluidos en el directorio.
				$file = file($direct.'/'.$files);

				//Se obtiene la extensión del archivo actual.
				$ext = pathinfo($files, PATHINFO_EXTENSION);

				//De ser válida...
				if(in_array($ext,$validExt)){
					$i = 0;

					//Se recorren las líneas del archivo.
					foreach($file as $line){
						$i++;

						//Se separan laspalabras por espacio.
						$thisLine = explode(" ",$line);


			      		foreach ($thisLine as $word){
			      			//Se eliminan las variables u otras palabras que contengan caracteres especiales.
			      			if(preg_match('/^\pL+$/u', $word)){

			          			if(pspell_check($pspell_link, $word)){			          				
			          			}else{
			          				//Si la palabra contiene errores sintacticos, se muestra el archivo, la palabra y la línea que la contiene.
			          				echo $direct.'/'.$files;
			          				echo " - Word: ".$word;
			          				echo " - Line: ".$i;
			          			}			          
			          		}
			      		}
			      	}
				}								
			}
		}
	}
?>