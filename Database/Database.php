<?php
    use Dotenv\Dotenv;

    class Database{
      private $conn = null;
      
      public function connect() {
        try{
          $dotenv = Dotenv::createImmutable(__DIR__."/../");
          $dotenv->load();

          $this->conn = new PDO("mysql:host=$_ENV[DB_HOST];dbname=$_ENV[DB_NAME]", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
          echo "Connection error: ".$e->getMessage();
        }

        return $this->conn;
      }
    }
?>
