<?php
	
class Login {

		private $conn;
		private $table_nama = "ref_login";

        public $username;
		public $password;
		public $id_petugas_login;
		
		public function __construct($db){
			$this->conn = $db;
		}

		public function login(){
			$query = "SELECT * FROM ".$this->table_nama. " WHERE username = '$this->username'";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

		// public function read(){
		// 	$query = "SELECT * FROM ".$this->table_nama. " WHERE username = '$this->username' AND password = '$this->password'";

		// 	$stmt = $this->conn->prepare($query);
		// 	$stmt->execute();

		// 	$row = $query->fetch(PDO::FETCH_ASSOC);

		// 	$this->id_petugas_login = $row['id_petugas_login'];
		// }
    }
?>