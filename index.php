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
		</script>
<title>IT-challenge</title>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="center">
<div class="header">
<ul>
  <li><a href="default.asp">Home</a></li>
  <li><a href="news.asp">+ Project</a></li>
  <li><a href="contact.asp">+ Resource</a></li>
  <li><a href="about.asp">Log in</a></li>
  <li><a href="about.asp">Register</a></li>
</ul>
</div>
<div class="centermid">
			

				 <form method="GET" action="search.php">
				<div id="nummer"  class="count">0</div>
					
					
				<input id="input" type="text" placeholder="Search..." name="q" onkeyup="getHints($(this).val());" autofocus autocomplete="off"/><input type="submit" id="button" value="">
				<ul class="results"></ul>
				</form>
				
</div>
</body>
</html>
