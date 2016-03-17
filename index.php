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
									resultString += "<li>" + value + "</li><br/>";
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
						}
					});
				}
			}
			
			function updateType(){
				getHints(lastInput);
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
  <li><a href="login.php">Log in</a></li>
  <li><a href="adduser.php">Register</a></li>
</ul>
</div>
<div class="fade">

<div class="centermid">
			

				 <form method="GET" action="search.php">
<div id="radio"><input type="radio" class="radio_item" id="radio1" name="type" value="R" checked onclick="updateType();"></input>
				<label class="label_item" for="radio1"> <img src="Rbutton.jpg"> </label>
				<input type="radio" class="radio_item" id="radio2" name="type" value="P" onclick="updateType();"></input>
				<label class="label_item" for="radio2"> <img src="Pbutton.jpg"> </label></div>


				<div id="nummer"  class="count">0</div>
				<input id="input" type="text"  placeholder="Search..." name="q" onkeyup="getHints($(this).val());" autofocus autocomplete="off"/><input type="submit" id="button" value="">
				

     <ul class="results"></ul>
				
				
				
				
		

</form>







</div>				
</div>

</body>
</html>
