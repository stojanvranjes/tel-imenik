<html>
<head>
	<title>Imenik</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div id="wrap">
	
		<div id="search">
		
			<a href="index.php"><img src="img/search.jpg" alt="Search"></a>
			<a href="insert.php"><img src="img/add.png" alt="Add"></a>
			
			
			<?php
			
			
			
			require_once 'inc/removeContact.php';
			
			
			
			
			class Remove {
				
			public $result;
			public $conn;
			public $query;
			
			public function __construct (){
	
			$this->conn = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if (!$this->conn){
			
			die ("Greska".mysqli_connect_error());
				}
			}
			
			
			public function Remove (){	
				
			$this->query = "select * from kontakti";
			$this->result = mysqli_query ($this->conn, $this->query);
			if(mysqli_num_rows($this->result)>0){
				while ($row = mysqli_fetch_assoc($this->result)){
					?>
					
					<div id="result">
					
					<a href="inc/removeContact.php?id=<?php echo $row['id'] ?>"><img src="img/remove.png"></a>
					<p><b>Name: </b><?php echo $row['ime']." ".$row['prezime']; ?></p>
					<p>Tel: <?php echo $row['tel']; ?></p>
					
					</div>
					
					<?php
				}
			}else {
				echo "Nema kontakata";
			}
			
			}
			
		}
		
		
		
		
		
		$rem = new Remove ();
		
		$rem->Remove();
			
			?>
		
		</div>
		
		
	
	</div>

</body>

</html>