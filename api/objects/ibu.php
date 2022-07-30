<?php
    class Ibu{
        private $conn;
        private $table_nama = "ref_ibu";

        public $id_ibu;
        public $nama_ibu;
        public $nik_ibu;
        public $alamat_ibu;
        public $no_telp_ibu;
        public $startPage;
        public $dataPerPage;

        public function __construct($db){
            $this->conn = $db;
            $this->id_ibu = uniqid("ib");
        }

        function read(){
            $query = "SELECT * FROM " . $this->table_nama;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        function readPagination(){
            $query = "SELECT * FROM " . $this->table_nama. " LIMIT $this->startPage, $this->dataPerPage";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        function create(){
            $query = "INSERT INTO " . $this->table_nama . " SET nama_ibu= '$this->nama_ibu', nik_ibu='$this->nik_ibu', alamat_ibu='$this->alamat_ibu', no_telp_ibu='$this->no_telp_ibu';";

            $stmt = $this->conn->prepare($query);
            
            //$this->nama_ibu=htmlspecialchars($this->nama_ibu);
            // $this->nik_ibu=htmlspecialchars($this->nik_ibu);
            // $this->alamat_ibu=htmlspecialchars($this->alamat_ibu);
            // $this->no_telp_ibu=htmlspecialchars($this->no_telp_ibu);
      
        
            // // bind values
            // $stmt->bindParam(":nama_ibu", $this->nama_ibu);
            // $stmt->bindParam(":nik_ibu", $this->nik_ibu);
            // $stmt->bindParam(":alamat_ibu", $this->alamat_ibu);
            // $stmt->bindParam(":no_telp_ibu", $this->no_telp_ibu);
        
            // execute query
            if($stmt->execute()){
                return true;
             }
            return false;
        }

        function read_one(){
  
            // query to read single record
            $query = "SELECT * FROM $this->table_nama WHERE id_ibu = '$this->id_ibu'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->nama_ibu = $row['nama_ibu'];
            $this->nik_ibu = $row['nik_ibu'];
            $this->alamat_ibu = $row['alamat_ibu'];
            $this->no_telp_ibu = $row['no_telp_ibu'];
        }

        public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET nama_ibu = '$this->nama_ibu', 
						nik_ibu = '$this->nik_ibu', 
						alamat_ibu = '$this->alamat_ibu ',    
						no_telp_ibu = '$this->no_telp_ibu'
					WHERE id_ibu = '$this->id_ibu'";
		   
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
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_ibu = $this->id_ibu";
          
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