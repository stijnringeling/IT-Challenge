<html>
	<head>
		<!--jquery ajax script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript">
			lastInput = "";
			function getHints(text){
				if(lastInput != text){
					$.ajax({
						url: "getHints.php",
						data: {"search": text},
						dataType: "json",
						success: function(data, status, j){
							var resultString = "";
							if(data[0].length != 0){
								$.each(data[0], function(key, value){
									if(resultString == ""){
										resultString = value;
									}else{
										resultString += "<br/>" + value;
									}
								});
							}
							$(".results").html(resultString);
							$(".count").html(data[1]);
							lastInput = text;
						}
					});
				}
			}
		</script>
		<title>ITchallenge</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>

		<div class="header">
		<div id="homebutton" class="headerbutton">
Home
		</div>
		<div id="addprojectbutton" class="headerbutton">
Project toevoegen
		</div>
		<div id="addresourcebutton" class="headerbutton">
Resource toevoegen
		</div>
		<div id="inlogbutton" class="headerbutton">
Inloggen
		</div>
		</div>
		<div class="content">
			<form method="GET" action="search.php">
				<div id="nummer" class="count">0</div>
				<div id="input" class="center"><input type="text" name="q" onkeyup="getHints($(this).val());" autofocus autocomplete="off"/></div>
				<div id="button" class="center"><input type="submit" value="zoeken"/></div>
				<p class="results"></p>
			</form>
		</div>
		<div class="footer">
		</div>
	</body>
</html>
