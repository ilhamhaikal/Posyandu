<?php

class Vaksin  {

		private $conn;
		private $table_nama = "ref_vaksin";

        public $id_vaksin;
		public $nama_vaksin;
        public $startPage;
        public $dataPerPage;
		
		public function __construct($db){
			$this->conn = $db;
            $this->id_vaksin = uniqid("vak");
		}
		public function read(){
			$query = "SELECT * FROM ".$this->table_nama;

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

        public function readPagination(){
            $query = "SELECT * FROM ".$this->table_nama. " LIMIT $this->startPage, $this->dataPerPage";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
        }

		function create(){
            $query = "INSERT INTO " . $this->table_nama . " SET nama_vaksin= '$this->nama_vaksin';";
            
            $stmt = $this->conn->prepare($query);

            // $this->nama_vaksin=htmlspecialchars($this->nama_vaksin);
            // $this->alamat_posyandu=htmlspecialchars($this->alamat_posyandu);
            // $this->kel_posyandu=htmlspecialchars($this->kel_posyandu);
            // $this->kec_posyandu=htmlspecialchars($this->kec_posyandu);
    
        
            //bind values
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
  
            // query to read single record
            $query = "SELECT * FROM $this->table_nama WHERE id_vaksin = '$this->id_vaksin'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->nama_vaksin = $row['nama_vaksin'];
        }

        public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET nama_vaksin = '$this->nama_vaksin'
					WHERE id_vaksin = '$this->id_vaksin'";
		  
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
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_vaksin = $this->id_vaksin";
          
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