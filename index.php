<html>
	<head>
		<!--jquery ajax script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript">
			function getHints(text){
				$.ajax({
					url: "getHints.php",
					data: {"search": text},
					dataType: "json",
					success: function(data, status, j){
						var resultString = "";
						if(data.length != 0){
							$.each(data, function(key, value){
								if(resultString == ""){
									resultString = value;
								}else{
									resultString += "<br/>" + value;
								}
							});
						}
						$(".results").html(resultString);
					}
				});
			}
		</script>
		<title>ITchallenge</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
		<center>
			<form method="GET" action="search.php">
				<input type="text" name="q" onkeyup="getHints($(this).val());" autofocus autocomplete="off"/>
				<input type="submit" value="zoeken"/><br/>
				<p class="results"></p>
			</form>
		</center>
	</body>
</html>
