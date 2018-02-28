
<html>
<head>
	<title>Imenik</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div id="wrap">
	
		<div id="search">
		
			
			<a href="index.php"><img src="img/search.jpg" alt="Search"></a>
			<a href="remove.php"><img src="img/remove.png" alt="Remove"></a>
			
			<form action="#" method="POST">
				<label>Ime: <br>
				<input type="text" name="ime"></label><br>
				<label>Prezime: <br>
				<input type="text" name="prezime"></label><br>
				<label>Tel: <br>
				<input type="text" name="tel"></label><br>
				<input type="submit" name="insert" value="Insert"><br>
			</form>
		
		</div>
		<div id="massage">
			<?php
			
			
			require 'inc/parametri.php';

			
			class Ubaci  {
			
			public $ime;
			public $prezime;
			public $tel;
			public $query;
			public $conn;
			
			public function __construct (){
	
			$this->conn = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if (!$this->conn){
			
			die ("Greska".mysqli_connect_error());
				}
			}
			
			public function Ubaci (){
		
			if (isset($_POST['insert'])){
				if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['tel']) ){
					if(!empty($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['tel'])){
						$this->ime = trim($_POST['ime']);
						$this->prezime = trim($_POST['prezime']);
						$this->tel = trim($_POST['tel']);
						
						$this->ime = mysqli_real_escape_string ($this->conn, $this->ime);
						$this->prezime = mysqli_real_escape_string ($this->conn, $this->prezime);
						$this->tel = mysqli_real_escape_string ($this->conn, $this->tel);
						
						$this->query = "INSERT INTO kontakti (ime, prezime, tel) VALUES ('{$this->ime}', '{$this->prezime}', '{$this->tel}')";
						if (mysqli_query ($this->conn, $this->query) === TRUE){
							
							echo "Novi kontakt dodat";
						}else {
							echo "Error";
						}
					}else {
						echo "Sva polja se moraju popuniti";
					}
				}else {
					echo "Sva polja se moraju popuniti";
				}
				}
				
			}
				
		}
		
		
		$ins = new Ubaci();
		$ins->Ubaci();
			?>
		</div>
		
	</div>

</body>

</html>