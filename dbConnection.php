<?php
$servername = 'localhost';
$username = 'privates_privates';
$password = '6pS2-5Ln]YylD7';
$dbname = 'privates_privatestaff';
$conn = mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
    echo 'connection failed';
    exit();
}
?>