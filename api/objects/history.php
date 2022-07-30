<?php
		
class History{
		private $conn;
		private $table_nama = "ref_imunisasi";

		public $id_anak;
		public $startPage;
        public $dataPerPage;

		public function __construct($db){
			$this->conn = $db;
		}
		public function readHistory(){
			$query = "SELECT tgl_imunisasi, id_vaksin FROM $this->table_nama WHERE id_anak= '$this->id_anak'";

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
        }
        
	}
?>