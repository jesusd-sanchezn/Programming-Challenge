<html>
<head>
	<title>MarkDown formatter</title>
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>
	<div class="roundedDiv container">
		<form action="functions/readFile.php" method="POST" enctype="multipart/form-data">
		<span class="texts">Select a File:</span>	
		<input id = "file" name = "file" type="file" /><br>
		<button id="format">
			<span class="texts">Formatear</span>
		</button>
		<input type="hidden" name="MAX_SIZE" value="100000">
		</form>
	</div>					
</body>
</html>