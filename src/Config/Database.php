<?php 
    class Database{
      private $host = "localhost";
      private $db_name = "hackeuse_poulette":
      private $username = "segfault";
      private $db_password = "beCode2023";
      private $conn = null;

      public function connect() {
        try{
          $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->db_password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
          echo "Connection error: ".$e->getMessage();
        }

        return $this->conn;
      }
    }
?>
