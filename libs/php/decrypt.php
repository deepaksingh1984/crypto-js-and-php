<?php
session_start();
$key = $_SESSION['cryptPs'];
include('aes-encryption.php');
if(isset($_POST)){
	echo cryptoJsAesDecrypt($key, $_POST["crypt"]);
}

?>