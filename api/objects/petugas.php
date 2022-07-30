<?php
    class Petugas{
        private $conn;
        private $table_nama = "ref_petugas";

        public $id_petugas;
        public $nama_petugas;
        public $jabatan_petugas;
        public $jk_petugas;
        public $tempat_lahir_petugas;
        public $tgl_lahir_petugas;
        public $alamat_petugas;
        public $no_telp_petugas;
        public $status_petugas;
        public $startPage;
        public $dataPerPage;
        public $id_petugas_login = "";

        public function __construct($db){
            $this->conn = $db;
            $this->id_petugas = uniqid("pet");
        }

        function read(){
            $query = "SELECT * FROM " . $this->table_nama;

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        function readPagination(){
            $query = "SELECT * FROM " . $this->table_nama . " LIMIT $this->startPage, $this->dataPerPage";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        function create(){
            $query = "INSERT INTO " . $this->table_nama . " SET id_petugas = '$this->id_petugas', nama_petugas='$this->nama_petugas', jabatan_petugas='$this->jabatan_petugas', jk_petugas='$this->jk_petugas', tempat_lahir_petugas='$this->tempat_lahir_petugas', tgl_lahir_petugas='$this->tgl_lahir_petugas', alamat_petugas='$this->alamat_petugas',no_telp_petugas='$this->no_telp_petugas',status_petugas='$this->status_petugas'";
            
            
            $stmt = $this->conn->prepare($query);
            
            // $this->nama_petugas=htmlspecialchars($this->nama_petugas);
            // $this->nik_ibu=htmlspecialchars($this->nik_ibu);
            // $this->alamat_ibu=htmlspecialchars($this->alamat_ibu);
            // $this->no_telp_ibu=htmlspecialchars($this->no_telp_ibu);
    
        
            // // bind values
            // $stmt->bindParam(":nama_petugas", $this->nama_petugas);
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
            $query = "SELECT * FROM $this->table_nama WHERE id_petugas = '$this->id_petugas'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->nama_petugas = $row['nama_petugas'];
            $this->jabatan_petugas = $row['jabatan_petugas'];
            $this->jk_petugas = $row['jk_petugas'];
            $this->tempat_lahir_petugas = $row['tempat_lahir_petugas'];
            $this->tgl_lahir_petugas = $row['tgl_lahir_petugas'];
            $this->jabatan_petugas = $row['jabatan_petugas'];
            $this->alamat_petugas = $row['alamat_petugas'];
            $this->no_telp_petugas = $row['no_telp_petugas'];
            $this->status_petugas = $row['status_petugas'];
        }

        function read_one_login(){
  
            // query to read single record
            $query = "SELECT * FROM $this->table_nama WHERE id_petugas = '$this->id_petugas_login'";
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->nama_petugas = $row['nama_petugas'];
            $this->jabatan_petugas = $row['jabatan_petugas'];
            $this->jk_petugas = $row['jk_petugas'];
            $this->tempat_lahir_petugas = $row['tempat_lahir_petugas'];
            $this->tgl_lahir_petugas = $row['tgl_lahir_petugas'];
            $this->jabatan_petugas = $row['jabatan_petugas'];
            $this->alamat_petugas = $row['alamat_petugas'];
            $this->no_telp_petugas = $row['no_telp_petugas'];
            $this->status_petugas = $row['status_petugas'];
        }

        public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET nama_petugas = '$this->nama_petugas', 
						jabatan_petugas = '$this->jabatan_petugas', 
						jk_petugas = '$this->jk_petugas ', 
						tempat_lahir_petugas = '$this->tempat_lahir_petugas',
                        tgl_lahir_petugas = '$this->tgl_lahir_petugas', 
						alamat_petugas = '$this->alamat_petugas', 
						no_telp_petugas = '$this->no_telp_petugas ', 
						status_petugas = '$this->status_petugas'
					WHERE id_petugas = '$this->id_petugas'";
		  
			// prepare query statement
			$stmt = $this->conn->prepare($query);
		  
			// execute the query
			if($stmt->execute()){
				return true;
			}
		  
			return false;
		}

        public function delete(){
  
            // delete query
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_petugas = $this->id_petugas";
          
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