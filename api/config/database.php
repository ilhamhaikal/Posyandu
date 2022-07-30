<?php

    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "eposyandu";

        public $conn;

        public function getConnection(){
            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host. ";dbname=" .$this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            } catch (PDOException $pdoexcep){
                echo "Conneciton error : " . $pdoexcep->getMessage();
            }

            return $this->conn;
        }
    }    
?>