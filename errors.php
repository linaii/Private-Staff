<?php
// session_start();
try {
    $conn = new PDO("mysql:host=localhost;dbname=privates_privatestaff","privates_privates","6pS2-5Ln]YylD7"
	,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (Exception $error) {
    die("ERROR: Couldn't connect. {$error->getMessage()}");
}
?>