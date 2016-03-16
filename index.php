<html>
	<head>
		<!--jquery ajax script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript">
			lastInput = "";
			type = "R";
			lastType = "R";
			function getHints(text){
				type = $('input[name=type]:checked').val();
				if(lastInput != text || lastType != type){
					$.ajax({
						url: "getHints.php",
						data: {"search": text, "type": type},
						dataType: "json",
						success: function(data, status, j){
							var resultString = "";
							if(data[0].length != 0){
								$.each(data[0], function(key, value){
									if(resultString == ""){
										resultString = "<li>" + value + "</li>";
									}else{
										resultString += "<li>" + value + "</li>";
									}
								});
							}
							$(".results").html(resultString);
							$(".count").html(data[1]);
							lastInput = text;
							lastType = type;
						}
					});
				}
			}
			
			function updateType(){
				getHints(lastInput);
			}
		</script>
		<title>ITchallenge</title>
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>

		<div class="header">
		<a href="index.php"><div id="homebutton" class="headerbutton">
Home
		</div></a>
		<div id="addprojectbutton" class="headerbutton">
Project toevoegen
		</div>
		<div id="addresourcebutton" class="headerbutton">
Resource toevoegen
		</div>
<a href="login.php"><div id="inlogbutton" class="headerbutton">
Inloggen
		</div></a>
		</div>
		<div class="content">
			<form method="GET" action="search.php">
				<p class="count">0</p>
				<input type="radio" name="type" value="R" checked onclick="updateType();">R</input>
				<input type="radio" name="type" value="P" onclick="updateType();">P</input>
				<div id="input"><input type="text" name="q" onkeyup="getHints($(this).val());" autofocus autocomplete="off"/></div>
				<div id="button"><input type="submit" value="zoeken"/><br/></div>
				<p class="results"></p>
			</form>
		</div>
		<div class="footer">
		</div>
	</body>
</html>
