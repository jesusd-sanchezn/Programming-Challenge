<?php 
	//Directorio en el que se encuentra el archivo
	$targetFilesDir = $targetFilesDir.basename($_FILES["file"]["name"]);
	
	if ($_FILES["file"]["error"] > 0)
  	{
  		echo "Error: " . $_FILES["file"]["error"] . "<br />";
  	}
	else
  	{
  	  //Copia del archivo para modificarlo
	  if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilesDir)){	  

	  	//Abrir archivo con permisos de escritura
	  	$file = fopen($targetFilesDir,'rw');

	  	//Lectura del archivo
	  	$data = fread($file,  filesize($targetFilesDir));

	  	//Reemplazo del Carriage Return por la sintaxis (espacio, espacio, return)
	  	$data = preg_replace("%\r\n%", "  \n", $data);

	  	//Limpiar el contenido del archivo
	  	file_put_contents($targetFilesDir, "");	  	

	  	//Escribir el texto formateado
	  	file_put_contents($targetFilesDir, $data);

	  	//Mantener el nombre del archivo
	  	$filename = $_FILES["file"]["name"];

	  	//Descarga del nuevo archivo con formato MarkDown
	  	header("Content-disposition: attachment;filename=$filename");
  		readfile($targetFilesDir);  		
	  }else{
	  	echo "Error";
	  }
  	}
?>