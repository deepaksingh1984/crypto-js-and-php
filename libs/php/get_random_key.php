<?php
session_start();
$sname = time();
$_SESSION['cryptPs'] = $sname;
echo $sname;
?>