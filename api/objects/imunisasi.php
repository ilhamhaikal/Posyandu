<?php
		
	class Imunisasi  {
		private $conn;
		private $table_nama = "ref_imunisasi";

		public $id_imunisasi;
		public $tgl_imunisasi;
		public $usia_saat_vaksin;
		public $tinggi_badan;
		public $berat_badan_umur;
		public $berat_badan_berdiri;
		public $berat_badan_terlentang;
		public $periode;
		public $nama_anak;
		public $nama_petugas;
		public $nama_vaksin;
		public $nama_ibu;
		public $fromDate;
		public $toDate;
		public $startPage;
        public $dataPerPage;

		public function __construct($db){
			$this->conn = $db;
			$this->id_imunisasi = uniqid("imu");
		}
		public function read(){
			$query = "SELECT ref_imunisasi.id_imunisasi, ref_imunisasi.tgl_imunisasi, ref_imunisasi.usia_saat_vaksin, 
			ref_imunisasi.tinggi_badan, ref_imunisasi.berat_badan_umur, ref_imunisasi.berat_badan_berdiri, ref_imunisasi.berat_badan_terlentang,  ref_imunisasi.periode, ref_anak.nama_anak,
			ref_petugas.nama_petugas, ref_ibu.nama_ibu, ref_imunisasi.id_vaksin FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON ref_imunisasi.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_imunisasi.id_ibu = ref_ibu.id_ibu".
			" LEFT JOIN ref_petugas ON ref_imunisasi.id_petugas = ref_petugas.id_petugas";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
		}

		public function readPagination(){
			$query = "SELECT ref_imunisasi.id_imunisasi, ref_imunisasi.tgl_imunisasi, ref_imunisasi.usia_saat_vaksin, 
			ref_imunisasi.tinggi_badan, ref_imunisasi.berat_badan_umur, ref_imunisasi.berat_badan_berdiri, ref_imunisasi.berat_badan_terlentang, ref_imunisasi.periode, ref_anak.nama_anak,
			ref_petugas.nama_petugas, ref_ibu.nama_ibu, ref_imunisasi.id_vaksin FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON ref_imunisasi.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_imunisasi.id_ibu = ref_ibu.id_ibu".
			" LEFT JOIN ref_petugas ON ref_imunisasi.id_petugas = ref_petugas.id_petugas LIMIT $this->startPage, $this->dataPerPage";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
		}

		public function create(){
			
			// query to insert record
			$query = "INSERT INTO
						" . $this->table_nama . " (id_imunisasi, tgl_imunisasi, usia_saat_vaksin, tinggi_badan, berat_badan_umur, berat_badan_berdiri, berat_badan_terlentang, periode, id_vaksin, id_anak, id_petugas, id_ibu) values ('$this->id_imunisasi','$this->tgl_imunisasi', '$this->usia_saat_vaksin', '
						$this->tinggi_badan', '$this->berat_badan_umur', '$this->berat_badan_berdiri', '$this->berat_badan_terlentang', '$this->periode', '$this->nama_vaksin', '$this->nama_anak', '$this->nama_petugas', '$this->nama_ibu')";
		 	// prepare query
			$stmt = $this->conn->prepare($query);
			
			// sanitize
			// $this->tgl_imunisasi=htmlspecialchars(strip_tags($data['tgl_imunisasi']));
			// $this->usia_saat_vaksin=htmlspecialchars(strip_tags($data['usia_saat_vaksin']));
			// $this->tinggi_badan=htmlspecialchars(strip_tags($data['tinggi_badan']));
			// $this->berat_badan=htmlspecialchars(strip_tags($data['berat_badan']));
			// $this->periode=htmlspecialchars(strip_tags($data['periode']));
		  
			// bind values
			// $stmt->bindParam(":tgl_imunisasi", $this->tgl_imunisasi);
			// $stmt->bindParam(":usia_saat_vaksin", $this->usia_saat_vaksin);
			// $stmt->bindParam(":tinggi_badan", $this->tinggi_badan);
			// $stmt->bindParam(":berat_badan", $this->berat_badan);
			// $stmt->bindParam(":periode", $this->periode);
		  
			// execute query
			if($stmt->execute()){
				return true;
			}
			return false; 
		}

		function read_one(){
  
            // query to read single record
            $query = "SELECT ref_imunisasi.id_imunisasi, ref_imunisasi.tgl_imunisasi, ref_imunisasi.usia_saat_vaksin, 
			ref_imunisasi.tinggi_badan, ref_imunisasi.berat_badan_umur, ref_imunisasi.berat_badan_berdiri, ref_imunisasi.berat_badan_terlentang, ref_imunisasi.periode, ref_anak.nama_anak, ref_anak.id_anak, ref_petugas.id_petugas, ref_ibu.id_ibu, ref_imunisasi.id_vaksin,
			ref_petugas.nama_petugas FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON ref_imunisasi.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_petugas ON ref_imunisasi.id_petugas = ref_petugas.id_petugas". 
			" LEFT JOIN ref_ibu ON ref_imunisasi.id_ibu = ref_ibu.id_ibu WHERE id_imunisasi='$this->id_imunisasi'";
          
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
          
            // bind id of product to be updated
          
            // execute query
            $stmt->execute();
          
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->tgl_imunisasi = $row['tgl_imunisasi'];
            $this->usia_saat_vaksin = $row['usia_saat_vaksin'];
            $this->tinggi_badan = $row['tinggi_badan'];
            $this->berat_badan_umur = $row['berat_badan_umur'];
            $this->berat_badan_berdiri = $row['berat_badan_berdiri'];
            $this->berat_badan_terlentang = $row['berat_badan_terlentang'];
            $this->periode = $row['periode'];
			$this->nama_anak = $row['id_anak'];
			$this->nama_petugas = $row['id_petugas'];
			$this->nama_vaksin = $row['id_vaksin'];
			$this->nama_ibu = $row['id_ibu'];
        }

		public function update(){
  
			// update query
			$query = "UPDATE $this->table_nama 
					SET tgl_imunisasi = '$this->tgl_imunisasi', 
						usia_saat_vaksin = '$this->usia_saat_vaksin', 
						tinggi_badan = '$this->tinggi_badan ', 
						berat_badan_umur = '$this->berat_badan_umur',
						berat_badan_berdiri = '$this->berat_badan_berdiri',
						berat_badan_terlentang = '$this->berat_badan_terlentang',
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
            $query = "DELETE FROM " . $this->table_nama . " WHERE id_imunisasi = '$this->id_imunisasi'";
          
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // execute query
            if($stmt->execute()){
                return true;
            } 
            return false;
        }

		public function dataRekap(){
            $query = "SELECT ref_imunisasi.id_imunisasi, ref_imunisasi.tgl_imunisasi, ref_imunisasi.usia_saat_vaksin, 
			ref_imunisasi.tinggi_badan, ref_imunisasi.berat_badan_umur, ref_imunisasi.berat_badan_berdiri, ref_imunisasi.berat_badan_terlentang, ref_imunisasi.periode, ref_anak.nama_anak, ref_anak.usia_anak, ref_anak.tgl_lahir_anak,
			ref_petugas.nama_petugas, ref_ibu.nama_ibu, ref_ibu.alamat_ibu, ref_imunisasi.id_vaksin FROM ".$this->table_nama. 
			" LEFT JOIN ref_anak ON ref_imunisasi.id_anak = ref_anak.id_anak".
			" LEFT JOIN ref_ibu ON ref_imunisasi.id_ibu = ref_ibu.id_ibu".
			" LEFT JOIN ref_petugas ON ref_imunisasi.id_petugas = ref_petugas.id_petugas WHERE tgl_imunisasi BETWEEN '$this->fromDate' AND '$this->toDate'";

			$query2 = "SELECT ref_anak.id_anak, ref_anak.nama_anak, ref_anak.tgl_lahir_anak, ref_anak.usia_anak, ref_ibu.nama_ibu, ref_ibu.alamat_ibu, ref_imunisasi.id_imunisasi, ref_imunisasi.berat_badan_umur, ref_imunisasi.berat_badan_berdiri, ref_imunisasi.berat_badan_terlentang, ref_imunisasi.tinggi_badan, ref_imunisasi.id_vaksin, ref_imunisasi.tgl_imunisasi FROM ref_anak RIGHT JOIN ref_imunisasi ON ref_anak.id_anak = ref_imunisasi.id_anak LEFT JOIN ref_ibu ON ref_anak.id_ibu = ref_ibu.id_ibu WHERE tgl_imunisasi BETWEEN '$this->fromDate' AND '$this->toDate' GROUP BY ref_anak.id_anak";
        
            $stmt = $this->conn->prepare($query2);
			$stmt->execute();
			
			return $stmt;
        }

		public function ambilVaksin(){
			$query = "SELECT * FROM $this->table_nama WHERE tgl_imunisasi BETWEEN '$this->fromDate' AND '$this->toDate'";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			
			return $stmt;
		}
	}
?>