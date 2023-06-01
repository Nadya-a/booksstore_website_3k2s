<?php
$type=$_GET["type"];
$book_id=$_GET["book_id"];
$id_bask=$_COOKIE["Order_id"];


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

if($type==1){
    $strSQL1="SELECT * FROM orderlist WHERE Book_id=".$book_id." AND Order_id='".$id_bask."' ";
    $result=mysqli_query($conn,$strSQL1) or die ("");

    if($row=mysqli_fetch_array($result)){
        $strSQL1="UPDATE orderlist SET kolvo=kolvo+1 WHERE Book_id=".$book_id." AND Order_id='".$id_bask."' ";
    }
    else{
        $strSQL1="INSERT INTO orderlist(Book_id, Order_id, kolvo) VALUES ('".$book_id."', '".$id_bask."', 1)";
    }
    mysqli_query($conn, $strSQL1);
}

else
    if($type==2)
    {
        $strSQL1="SELECT * FROM orderlist WHERE Book_id=".$book_id." AND Order_id='".$id_bask."' ";
        $result=mysqli_query($conn,$strSQL1) or die ("");

        if($row=mysqli_fetch_array($result)){
            if($row["kolvo"]>1){
                $strSQL1="UPDATE orderlist SET kolvo=kolvo-1 WHERE Book_id=".$book_id." AND Order_id='".$id_bask."' ";
            }
            else{
                $strSQL1="DELETE FROM orderlist WHERE Book_id=".$book_id." AND Order_id='".$id_bask."' ";
            }
        }
        mysqli_query($conn, $strSQL1);
    }

    else
        if($type==3){
            $strSQL1="DELETE FROM orderlist WHERE Book_id=".$book_id." AND Order_id='".$id_bask."' ";
            mysqli_query($conn, $strSQL1);
        }

        else
            if($type==4){
                $strSQL="DELETE FROM orderlist WHERE Order_id='".$id_bask."'";
                mysqli_query($conn, $strSQL);
            }


include ("basket.php")
?>

