<?php
	// Asumo que el servidor está configurado para mostrar los 
	// directorios y que la propiedad "allow_url_fopen" està activa	

	//Se obtiene la url donde se efectuará la busqueda.
	$dir = $_REQUEST["url"];

	//Llamada a la funcion.
	getFilesFromDirectory($dir);

	// Función que ejecuta la busaqueda de la palabra en los archivos del directorio.
	function getFilesFromDirectory($direct){
		//Texto de busqueda
		$searchText = $_REQUEST["text"]; 

		//Se obtiene el directorio del objeto actual. 
		$directories = scandir($direct);


		foreach($directories as $files){
			if(($files == '.') || ($files == '..')){
			}elseif(is_dir($direct.'/'.$files)){
				//Si el objeto en el que estamos posicionados es una carpeta, recursivamente se llama a la función.
				getFilesFromDirectory($direct.'/'.$files);
			}else{
				//Variable para contar las líneas
				$i = 0;

				//Lectura de los archivos incluidos en el directorio.
				$file = file($direct.'/'.$files);
				foreach($file as $line){
					$i++;
					if(strpos($line, $searchText) !== false){
						//Si se encuentra la palabra se imprime el archivo y el numero de linea
						echo $direct.'/'.$files;
						echo " - Line: ".$i."<br>";
					}
				}
			}
		}
	}

?>