<html>
<head>
	<title>Imenik</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div id="wrap">
	
		<div id="search">
		
			<img src="img/search.jpg">
			<a href="insert.php"><img src="img/add.png" alt="Add"></a>
			<a href="remove.php"><img src="img/remove.png" alt="Remove"></a>
			
			<form action="#" method="GET">
			
				<input type="text" name="criteria" placeholder="Criteria...">
				<input type="submit" value="Search"><br>
			</form>
		
		</div><!-- end search -->
		
		<?php
		include 'inc/getResults.php';
		
		$rez = new GetResult ();
		
		$rez->Get ();
		
		?>
	
	</div>

</body>

</html>