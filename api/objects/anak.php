<?php
		
class Anak{
		private $conn;
		private $table_nama = "ref_anak";

		public $id_anak;
		public $nama_anak;
		public $nik_anak;
		public $tempat_lahir_anak;
		public $tgl_lahir_anak;
		public $usia_anak;
		public $jk_anak;
		public $id_ibu;
		public $startPage;
        public $dataPerPage;

		public function __construct($db){
			$this->conn = $db;
			$this->id_anak = uniqid("an");
		}
		public function read(){
			$query = "SELECT ref_anak.id_anak, ref_anak.nama_anak, ref_anak.nik_anak, ref_anak.tempat_lahir_anak, 
					ref_anak.tgl_lahir_anak, ref_anak.usia_anak, ref_anak.jk_anak, ref_ibu.nama_ibu FROM ".$this->table_nama.
					" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

		public function readPagination(){
			$query = "SELECT ref_anak.id_anak, ref_anak.nama_anak, ref_anak.nik_anak, ref_anak.tempat_lahir_anak, 
					ref_anak.tgl_lahir_anak, ref_anak.usia_anak, ref_anak.jk_anak, ref_ibu.nama_ibu FROM ".$this->table_nama.
					" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu LIMIT $this->startPage, $this->dataPerPage";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

		public function create(){

			// query to insert record
			$query = "INSERT INTO
						" . $this->table_nama . " SET id_anak = '$this->id_anak', nama_anak = '$this->nama_anak', nik_anak = '$this->nik_anak', tempat_lahir_anak = '$this->tempat_lahir_anak', tgl_lahir_anak = '$this->tgl_lahir_anak', usia_anak = '$this->usia_anak', jk_anak = '$this->jk_anak', id_ibu = '$this->id_ibu'";
		 	// prepare query
			$stmt = $this->conn->prepare($query);

		  
			// execute query	
		
			$stmt->execute();
	
			return $stmt;
		}

		public function read_one(){
  
            // query to read single record
            $query = "SELECT ref_anak.id_anak, ref_anak.nama_anak, ref_anak.nik_anak, ref_anak.tempat_lahir_anak, 
			ref_anak.tgl_lahir_anak, ref_anak.usia_anak, ref_anak.jk_anak, ref_ibu.id_ibu FROM ".$this->table_nama.
			" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu WHERE id_anak = '$this->id_anak'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->nama_anak = $row['nama_anak'];
            $this->nik_anak = $row['nik_anak'];
            $this->tempat_lahir_anak = $row['tempat_lahir_anak'];
            $this->tgl_lahir_anak = $row['tgl_lahir_anak'];
            $this->usia_anak = $row['usia_anak'];
            $this->jk_anak = $row['jk_anak'];
			$this->id_ibu = $row['id_ibu'];
        }

		public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET nama_anak = '$this->nama_anak', 
						nik_anak = '$this->nik_anak', 
						tempat_lahir_anak = '$this->tempat_lahir_anak ', 
						tgl_lahir_anak = '$this->tgl_lahir_anak', 
						usia_anak = '$this->usia_anak', 
						jk_anak = '$this->jk_anak',
						id_ibu = '$this->id_ibu'
					WHERE id_anak = '$this->id_anak'";
		  
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
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_anak = '$this->id_anak'";
          
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