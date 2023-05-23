<?php
session_start();

$pass= str_replace("'", "", $_POST["pass"]);
// $pass=$_POST["pass"];
$log=$_POST["login"];

$servername = "localhost";
$database = "booksstore";
$username = "root";
$password = "";





$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Соединение провалено по причине: " . mysqli_connect_error());
}
echo "";
mysqli_query($conn, "SET NAMES 'utf8'");

$strSQL1="SELECT * FROM user WHERE User_email='".$log."' AND User_password='".$pass."'";
$result1=mysqli_query($conn, $strSQL1) or die();


if($row=mysqli_fetch_array($result1)){
    $_SESSION['login']=$row["User_email"];
    $_SESSION['id']=$row["user_id"];
    $message=" ";
    $success=true;
}
else{
    $message="Таких данных не существует";
}

if($success){ ?>
    <a class="messagelog"><?php print $message; ?></a>
    <?php
    header('Location: http://mybook.com/mainpage.php ');


}
else{
    include("header.php"); ?>
    <a class="messagelog"><?php print $message; ?></a>
    <?php
}
?>

