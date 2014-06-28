<?php
require_once("opsworks.php");

class SQL {
  public static function main() {
    $opsWorks = new OpsWorks();
    $db = $opsWorks->db;
    $con = mysqli_connect($db->host, $db->username, $db->password, $db->database);

    $q="DROP TABLE IF EXISTS things";
    mysqli_query($con, $q);
    $q="CREATE TABLE things (name varchar(20))";
    mysqli_query($con, $q);
    $q="INSERT INTO things(name) VALUES('Dre')";
    mysqli_query($con, $q);
    $q="SELECT * FROM things";
    return mysqli_query($con, $q);
  }
}
?>

