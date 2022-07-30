<?php
		
	class Timbangan  {
		private $conn;
		private $table_nama = "trn_timbangan";

		public $id_timbang;
        public $id_anak;
		public $nama_anak;
		public $nama_ibu;
		public $alamat;
		public $status_kel;
		public $jenis_kelamin;
		public $tanggal_lahir;
		public $berat_badan;
		public $tinggi_badan;
		public $usia_anak;
        public $fromDate;
        public $toDate;
		public $startPage;
       public $dataPerPage;

		public function __construct($db){
			$this->conn = $db;
			$this->id_timbang = uniqid("tim");
		}
		public function read(){
			$query = "SELECT trn_timbangan.id_timbangan, trn_timbangan.id_anak, ref_anak.nama_anak, 
			ref_anak.id_ibu, ref_ibu.nama_ibu, ref_ibu.alamat_ibu, ref_anak.status_kel,
			ref_anak.jk_anak, ref_anak.tgl_lahir_anak, trn_timbangan.berat_badan, trn_timbangan.tinggi_badan FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON trn_timbangan.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu";
			

			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
		}

		public function readPagination(){
			$query = "SELECT trn_timbangan.id_timbangan, trn_timbangan.id_anak, ref_anak.nama_anak, 
			ref_anak.id_ibu, ref_ibu.nama_ibu, ref_ibu.alamat_ibu, ref_anak.status_kel,
			ref_anak.jk_anak, ref_anak.tgl_lahir_anak, trn_timbangan.berat_badan, trn_timbangan.tinggi_badan, ref_anak.usia_anak FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON trn_timbangan.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu LIMIT $this->startPage, $this->dataPerPage";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
		}

		public function create(){
			
			// query to insert record
			$query = "INSERT INTO
						" . $this->table_nama . " VALUES ('$this->nama_anak', '$this->berat_badan', '$this->tinggi_badan', '". date('Y-m-d'). "')";
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()){
				return true;
			}
			return false; 
		}

		function read_one(){
  
            // query to read single record
            $query = "SELECT trn_timbangan.id_timbangan, trn_timbangan.id_anak, ref_anak.nama_anak as Anak, 
			ref_anak.id_ibu, ref_ibu.nama_ibu, ref_ibu.alamat_ibu, ref_anak.status_kel,
			ref_anak.jk_anak, ref_anak.tgl_lahir_anak, trn_timbangan.berat_badan, trn_timbangan.tinggi_badan FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON trn_timbangan.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu WHERE id_timbangan='$this->id_timbang'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->tinggi_badan = $row['tinggi_badan'];
            $this->berat_badan = $row['berat_badan'];
			$this->nama_anak = $row['Anak'];

            
        }

		public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET tgl_imunisasi = '$this->tgl_imunisasi', 
						usia_saat_vaksin = '$this->usia_saat_vaksin', 
						tinggi_badan = '$this->tinggi_badan ', 
						berat_badan = '$this->berat_badan',
                        periode = '$this->periode',
						id_anak = '$this->nama_anak',
						id_petugas = '$this->nama_petugas',
						id_vaksin = '$this->nama_vaksin',
						id_ibu = '$this->nama_ibu'
					WHERE id_imunisasi = '$this->id_imunisasi'";
		  
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
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_timbangan = '$this->id_timbang'";
          
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // execute query
            if($stmt->execute()){
                return true;
            } 
            return false;
        }

        public function dataRekap(){
            $query = "SELECT trn_timbangan.id_timbangan, trn_timbangan.id_anak, ref_anak.nama_anak, 
			ref_anak.id_ibu, ref_ibu.nama_ibu, ref_ibu.alamat_ibu, ref_anak.status_kel, trn_timbangan.tanggal_penimbangan,
			ref_anak.jk_anak, ref_anak.usia_anak, ref_anak.tgl_lahir_anak, trn_timbangan.berat_badan, trn_timbangan.tinggi_badan FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON trn_timbangan.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu WHERE tanggal_penimbangan BETWEEN '$this->fromDate' AND '$this->toDate'";
        
            $stmt = $this->conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
        }
	}
?>