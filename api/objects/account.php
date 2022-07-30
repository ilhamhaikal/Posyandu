<?php
class Account {

		private $conn;
		private $table_nama = "ref_login";

        public $id_login;
		public $username;
        public $password;
        public $nama_petugas;
        public $startPage;
        public $dataPerPage;
		
		public function __construct($db){
			$this->conn = $db;
            $this->id_login = uniqid("log");
		}
		public function read(){
			$query = "SELECT ref_login.id_login, ref_login.username, ref_petugas.nama_petugas FROM ".$this->table_nama.
                " LEFT JOIN ref_petugas ON ref_login.id_petugas_login = ref_petugas.id_petugas WHERE id_login > 1";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

        public function readPagination(){
			$query = "SELECT ref_login.id_login, ref_login.username, ref_petugas.nama_petugas FROM ".$this->table_nama.
                " LEFT JOIN ref_petugas ON ref_login.id_petugas_login = ref_petugas.id_petugas WHERE id_login > 1 LIMIT $this->startPage, $this->dataPerPage";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

		function create(){
            $query = "INSERT INTO " . $this->table_nama. "(id_login, username, password, id_petugas_login)".
            " VALUES('$this->id_login', '$this->username', '$this->password', '$this->nama_petugas')";
            
            $stmt = $this->conn->prepare($query);

            // $this->nama_vaksin=htmlspecialchars($this->nama_vaksin);
            // $this->alamat_posyandu=htmlspecialchars($this->alamat_posyandu);
            // $this->kel_posyandu=htmlspecialchars($this->kel_posyandu);
            // $this->kec_posyandu=htmlspecialchars($this->kec_posyandu);
    
        
            // // bind values
            // $stmt->bindParam(":nama_vaksin", $this->nama_vaksin);
            // $stmt->bindParam(":alamat_posyandu", $this->alamat_posyandu);
            // $stmt->bindParam(":kel_posyandu", $this->kel_posyandu);
            // $stmt->bindParam(":kec_posyandu", $this->kec_posyandu);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
 
            return false;
        }

        function read_one(){
  
            $query = "SELECT ref_login.id_login, ref_login.username, ref_login.password, ref_petugas.nama_petugas FROM ".$this->table_nama.
                " LEFT JOIN ref_petugas ON ref_login.id_petugas_login = ref_petugas.id_petugas WHERE id_login = $this->id_login" ;

            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->nama_petugas = $row['nama_petugas'];
        }

        public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET username = '$this->username',
                    password = '$this->password'
					WHERE id_login = '$this->id_login'";
		  
			// prepare query statement
			$stmt = $this->conn->prepare($query);
		  
			// execute the query
			if($stmt->execute()){
				return true;
			}
		  
			return false;
		}

        function delete(){
  
            // delete query
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_login = $this->id_login";
          
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // execute query
            if($stmt->execute()){
                return true;
            } 
            return false;
        }
	}
?>