<?php
/*  function myConnect() {
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $dbname = "khoapham";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // mysqli_select_db($conn, $dbname);
    mysqli_query($conn, "SET NAME 'utf8'");
    // echo $conn ? 'true' : 'false';
    return $conn;
  }*/

  namespace Lib;

  class Connection {
    private $servername = "127.0.0.1:3306";
    private $username = "root";
    private $password = "";
    private $dbname = "khoapham";
    public $conn = null;

    public function __construct() {
      if (!$this->conn) {
        $this->connection();
      }
    }

    public function connection() {
        try {
            $this->conn = mysqli_connect(
                 $this->servername,
                 $this->username,
                 $this->password,
                 $this->dbname
            );
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function closeConnection() {
      $this->conn->close();
    }
  }

  class DB {
    public static function query($query_raw) {
      $data = array();
      try {
        $conn = (new Connection());
        $query = mysqli_query($conn->conn , $query_raw) or die(
          mysqli_error($conn->conn) . '<br>'
        );
        $conn->closeConnection();
        while( $row = mysqli_fetch_object($query) ) {
          array_push($data, $row);
        }

        return $data ?? null;
      } catch (\Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
  }

?>
