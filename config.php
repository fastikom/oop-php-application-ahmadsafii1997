<?php
//class untuk menghubungkan database
class Config{
    var $dbhost="localhost";
    var $dbuser="root";
    var $dbpass="";
    var $dbname="buku";
    
    function koneksi(){
        ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->dbhost,  $this->dbuser,  $this->dbpass, $this->dbname)) or die("Koneksi lagi masuk angin ! " .mysqli_error($GLOBALS["___mysqli_ston"]));
        mysqli_select_db($GLOBALS["___mysqli_ston"], $this->dbname) or die ("Database lagi mutung. " .mysqli_error($GLOBALS["___mysqli_ston"]));
    }
}
?>
