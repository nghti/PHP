<?php
  function myConnect() {
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $dbname = "khoapham";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // mysqli_select_db($conn, $dbname);
    mysqli_query($conn, "SET NAME 'utf8'");
    // echo $conn ? 'true' : 'false';
    return $conn;
  }
?>