<?php
session_start();

$servername = "localhost";
$database = "booksstore";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);


$name =$_POST["name"];
$phone =$_POST["phone"];
$mail =$_POST["mail"];
$id =$_SESSION["id"];

$message="";
if($name!="" && $phone!="" && $mail!="" ){

    $replace_symbols=['<', '>', 'script', '/', 'alert'];
    $name =str_replace($replace_symbols, "", $_POST["name"]);
    $phone =str_replace($replace_symbols, "", $_POST["phone"]);
    $mail =str_replace($replace_symbols, "", $_POST["mail"]);

    $strSQL1="UPDATE user SET User_name='".$name."', User_phone='".$phone."', User_email='".$mail."' WHERE user_id=".$id;
    $result1=mysqli_query($conn, $strSQL1) or die(" ");
    $_SESSION["login"]=$mail;
    header('Location: http://mybook.com/cabinet.php ');
}
else
    $message="Не все поля заполнены!";
print ($message);
?>


