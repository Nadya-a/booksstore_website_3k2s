
<link rel="stylesheet" type="text/css" href="...css/styles.css"/>
<?php
session_start();
include ("header.php");

$message="";

$log=$_SESSION["login"];
$id=$_SESSION["id"];



if(!isset($log) ){
    $success=false;
    $message=" ";
    include ("login.php");
}
else
    $success=true;


print $message;

if($success) {

    $servername = "localhost";
    $database = "booksstore";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Соединение провалено по причине: " . mysqli_connect_error());
    }
    echo "";

    $strSQL1 = "SELECT * FROM user WHERE user_id='" . $id . "'";
    $result1 = mysqli_query($conn, $strSQL1) or die ("");
    if ($row = mysqli_fetch_array($result1)) {
    }
}
?>


<h3 style="margin-left: 30%; margin-top: 2rem; margin-bottom: 2rem">Редактировать персональные данные</h3>
<section class="cab" id="cab">
  <div class="row">
      <p>Ваше имя: <?php print $row["User_name"] ?></p>
      <form action="change.php" method="post">
         <input type="text" name="name" value="<?php print $row["User_name"] ?>" placeholder="Имя" class="box"> <br><br>
         <input type="text" name="phone" value="<?php print $row["User_phone"] ?>" placeholder="Адрес" class="box"><br><br>
         <input type="text" name="mail" value="<?php print $row["User_email"]?>" placeholder="Е-mail" class="box"><br><br>

         <input type="submit" value="Сохранить" class="btn" style="background: #CE633E; color: white; font-weight: bolder; margin-left: 5rem">
     </form>
 </div>
</section>


<?php
include ("footer.php");
?>