<?php

require 'konekcija.php';




class GetResult extends Konekcija {
	
	public $criteria;
	public $query;
	public $result;
	
	
	public function Get (){
	
	if(isset($_GET['criteria'])){
		if (!empty($_GET['criteria'])){
			$this->criteria = trim($_GET['criteria']);
			$this->criteria = mysqli_real_escape_string($this->conn, $this->criteria);
			$this->query = "SELECT * FROM kontakti WHERE ime LIKE '%{$this->criteria}%' OR prezime LIKE '%{$this->criteria}%'";
			$this->result = mysqli_query($this->conn, $this->query);
			if(mysqli_num_rows($this->result)>0){
			while ($row = mysqli_fetch_assoc($this->result)){
				?>
				
				<div id="result">
				<p><b>Name: </b><?php echo $row['ime']." ".$row['prezime']; ?></p>
				<p>Tel: <?php echo $row['tel']; ?></p>
				</div>
				
				<?php
			}
			echo "Rezultata: ".mysqli_num_rows($this->result);
			}else {
				echo 'No result';
			}
		}else {
			echo 'Criteria is empty.';
		}
	}
	
	}
}

