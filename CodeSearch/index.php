<html>
	<head>
		<title>Code Search Engine</title>
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#search").bind('click', function(){
					//llamada al archivo que ejecutará la busqueda.
					$.ajax({
							url: 'functions/searchContent.php',
							method: 'post',
							data: {url: $("#url").val(), text: $("#text").val()},
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
			<span class="texts">Search Text:</span><input id="text" type="text" class="sText"><br>
			<span class="texts">In:</span><input id="url" type="text" class="sUrl">
			<button id="search">
				<span class="texts">Search</span>
			</button>
		
		</div>
		<div id="results"></div>		
	</body>
</html>
