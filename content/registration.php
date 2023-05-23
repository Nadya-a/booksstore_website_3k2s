<?php include ("header.php"); ?>

<?php
$name=$_POST["name"];
$mail=$_POST["mail"];
$pass=$_POST["pass"];
$pass2=$_POST["pass2"];
$phone=$_POST["phone"];
$type=$_POST["type"];

$servername = "localhost";
$database = "booksstore";
$username = "root";
$password = "";


$message="";
$success=false;

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Соединение провалено по причине: " . mysqli_connect_error());
}
echo "";
mysqli_query($conn, "SET NAMES 'utf8'");

if($type==1){
    if($name!="" && $mail!="" && $phone!="" && $pass!="" && $pass2!=""){

        if(strpos($name, "<")!==false || strpos($phone, "<")!==false || strpos($mail, "<")!==false || strpos($pass, "<")!==false || strpos($pass2, "<")!==false){
            $message="Вы пытаетесь взломать сайт?";
        }
        else if(strpos($name, ">")!==false || strpos($phone, ">")!==false || strpos($mail, ">")!==false || strpos($pass, ">")!==false || strpos($pass2, ">")!==false){
            $message="Вы пытаетесь взломать сайт?";
        }

        else if($pass!=$pass2){
            $message="Пароли не совпадают";
        }
        else
        {
            $strSQL1="SELECT user_id FROM user WHERE User_email='".$mail."'";
            $result1=mysqli_query($conn,$strSQL1) or die("");
            if($row=mysqli_fetch_array($result1)){
                $message="Tакой логин уже существует";
            }
            else{
                $strSQL1="INSERT INTO user(User_name, User_email, User_phone, User_password) VALUES ('".$name."','".$mail."','".$phone."','".$pass."')";
                $result1=mysqli_query($conn,$strSQL1) or die ("");
                $message="Вы успешно зарегистрировааны";
                $success=true;
            }
        }
    }
    else{
       $message="Не все поля заполнены";
    }
}
?>
    <h4 style="margin-top: 20px; margin-left: 37%" class="message"><?php print $message; ?></h4>
<?php
if(!$success)
{
?>
        

<section class="contact" id="contact">
    <h3 style="margin-left: 41%; margin-bottom: 2rem; margin-top: 2rem">Регистрация</h3>
    <div class="row" style="margin-left: 36%">
        <form action="registration.php" method="post">
            <input type="text" name="name" value="<?php print $name ?>" placeholder="Имя" class="box"><br><br>
            <input type="text" name="mail" value="<?php print $mail?>" placeholder="Е-mail" class="box"><br><br>
            <input type="text" name="phone" value="<?php print $phone?>" placeholder="Телефон" class="box"><br><br>
            <input type="password" name="pass" value="" placeholder="Пароль" class="box"><br><br>
            <input type="password" name="pass2" value="" placeholder="Повтор пароля" class="box"><br><br>

            <input type="hidden" value="1" name="type">
            <input type="submit" value="Отправить" class="btn" style="background: #CE633E; color: white; font-weight: bolder; margin-left: 5rem">
        </form>

        <div class="image">
            <img src="../images/call.png" alt="">
        </div>
    </div>
</section>


<?php
mysqli_close($conn);
}


?>