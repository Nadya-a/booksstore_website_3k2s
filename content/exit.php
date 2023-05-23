<?php
session_start();

$log=$_SESSION["login"];
$id=$_SESSION["id"];
unset($log);
unset($id);
session_destroy();

include("mainpage.php");
?>