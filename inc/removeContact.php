<?php

require 'parametri.php';



class RemoveContact {
		
		public $conn;
		public $query;
		public $id;
		
		public function __construct (){
	
			$this->conn = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if (!$this->conn){
			
			die ("Greska".mysqli_connect_error());
				}
			}
		
		public function RemoveCon (){	

		if (isset($_GET['id'])){
			
			$this->id= $_GET['id'];
			
			$this->query = "delete from kontakti where id = {$this->id}";
			
			mysqli_query ($this->conn, $this->query);
			header ('Location: ../remove.php');
			
			}
			
		}

}

$kon = new RemoveContact();
$kon-> RemoveCon();