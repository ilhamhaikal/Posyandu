<?php
    class Posyandu{
        private $conn;
        private $table_nama = "ref_posyandu";

        public $id_posyandu;
        public $nama_posyandu;
        public $alamat_posyandu;
        public $kel_posyandu;
        public $kec_posyandu;
        public $kota_kab_posyandu;

        public function __construct($db){
            $this->conn = $db;
            $this->id_posyandu = uniqid("pos");
        }

        function read(){
            $query = "SELECT * FROM " . $this->table_nama;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        function create(){
            $query = "INSERT INTO " . $this->table_nama . " SET nama_posyandu= '$this->nama_posyandu', alamat_posyandu='$this->alamat_posyandu', kel_posyandu='$this->kel_posyandu', kec_posyandu='$this->kec_posyandu', kota_kab_posyandu='$this->kota_kab_posyandu';";
            
            $stmt = $this->conn->prepare($query);
            
            // $this->nama_posyandu=htmlspecialchars($this->nama_posyandu);
            // $this->alamat_posyandu=htmlspecialchars($this->alamat_posyandu);
            // $this->kel_posyandu=htmlspecialchars($this->kel_posyandu);
            // $this->kec_posyandu=htmlspecialchars($this->kec_posyandu);
    
        
            // // bind values
            // $stmt->bindParam(":nama_posyandu", $this->nama_posyandu);
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
            $query = "SELECT * FROM $this->table_nama WHERE id_posyandu = '$this->id_posyandu'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->nama_posyandu = $row['nama_posyandu'];
            $this->alamat_posyandu = $row['alamat_posyandu'];
            $this->kel_posyandu = $row['kel_posyandu'];
            $this->kec_posyandu = $row['kec_posyandu'];
            $this->kota_kab_posyandu = $row['kota_kab_posyandu'];
        }

        public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET nama_posyandu = '$this->nama_posyandu', 
						alamat_posyandu = '$this->alamat_posyandu', 
						kel_posyandu = '$this->kel_posyandu ', 
						kec_posyandu = '$this->kec_posyandu',
                        kota_kab_posyandu = '$this->kota_kab_posyandu'
					WHERE id_posyandu = '$this->id_posyandu'";
		  
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
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_posyandu = $this->id_posyandu";
          
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