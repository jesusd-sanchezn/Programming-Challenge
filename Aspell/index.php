<html>
	<head>
		<title>Aspell Checker</title>
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#search").bind('click', function(){
					//llamada al archivo que ejecutará la busqueda.
					$.ajax({
							url: 'functions/searchWords.php',
							method: 'post',
							data: {url: $("#url").val()},
							success: function(data) {
								$("#results").html(data);
							}
						});
				});
			});
		</script>
	</head>
	<body>
		<div id="contenido" class="roundedDiv container">
			<span class="texts">Search Directory:</span>
			<input id="url" type="text" class="sText">			
			<button id="search">
				<span class="texts">Search</span>
			</button>		
		</div>
		<div id="results"></div>
	</body>
</html>