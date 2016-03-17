<?php
	session_start();
	include_once("db_connect.inc.php");
	include_once("User.php");
	if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
		$user = new User($_SESSION["sessionID"], $db);
	}
?>
<html>
<head>
<!--jquery ajax script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript">
		
			lastInput = "";
			type = "R";
			lastType = type;
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
								counter = 0;
								$.each(data[0], function(key, value){
									resultString += "<li id=\"hint" + counter + "\" onclick=\"hintClick('hint" + counter + "')\">" + value + "</li><br/>";
									counter++;
									/*if(resultString == ""){
										resultString = value;
									}else{
										resultString += "<br/>" + value;
									}*/
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
			
			function hintClick(id){
				hint = $('#'+ id).html();
				$('#input').val(hint);
				getHints(hint);
			}
			
		</script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  
      
        $(".fade").fadeIn(500);
  
});
</script>

<title>IT-challenge</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="center">
<div class="header">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="addproject.php">+ Project</a></li>
  <li><a href="addNAW.php">+ Resource</a></li>
  <li><?php
	if(isset($user->ID)){
		echo "<a href=\"logout.php?from=". $_SERVER["PHP_SELF"] . "\">Log uit</a>";
	}else{
		echo "<a href=\"login.php?from=". $_SERVER["PHP_SELF"] . "\">Log in</a>";
	}?></li>
  <li><a href="adduser.php?from=<?php echo $_SERVER["PHP_SELF"];?>">Register</a></li>
</ul>
</div>
<div class="fade">

<div class="centermid">
			
				 <form method="GET" action="search.php">
<div id="radio"><input type="radio" class="radio_item" id="radio1" name="type" value="R" checked onclick="updateType();"></input>
				<label class="label_item" for="radio1"> <img src="Rbutton.jpg"> </label>
				<input type="radio" class="radio_item" id="radio2" name="type" value="P" onclick="updateType();"></input>
				<label class="label_item" for="radio2"> <img src="Pbutton.jpg"> </label></div>

				<div id="nummer"><div class="count">0</div></div>
				<input id="input" type="text"  placeholder="Search..." name="q" onkeyup="getHints($(this).val());" autofocus autocomplete="off"/><input type="submit" id="button" value="">
				
     <ul class="results"></ul>	

</form>

</div>				
</div>

</body>
</html>