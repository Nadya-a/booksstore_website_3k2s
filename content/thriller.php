<?php
session_start();

// Username is root
$user = 'root';
$password = '';

$database = 'booksstore';

// Server is localhost with
// port number 3306
$servername='localhost:3306';

$mysqli = new mysqli($servername, $user,
    $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
}

$sql = " SELECT * FROM book WHERE Book_genre='Триллер'";
$result = $mysqli->query($sql);

$s = " SELECT * FROM publishment ORDER BY Publishment_id";
$publishments = $mysqli->query($s);

$ss = "SELECT DISTINCT Book_genre FROM book";
$genres = $mysqli->query($ss);

#$a=$rows['Author_id'];
#$aut = "SELECT Author_name FROM author WHERE Author_id='$a'";
#$aa=$mysqli->query($aut);
#$aaa=mysqli_fetch_row($aa);
#$author=mysqli_fetch_row($mysqli->query($aut));

?>

<?php
include("header.php");
?>
    <!-- End -->

<?php
include("aside.php");
?>
<?php
// LOOP TILL END OF DATA
while($rows=$result->fetch_assoc())
{
    $a=$rows['Author_id'];
    $aut = "SELECT Author_name FROM author WHERE Author_id='$a'";
    #$aa=$mysqli->query($aut);
    #$aaa=mysqli_fetch_row($aa);
    $author=mysqli_fetch_row($mysqli->query($aut));
    ?>

    <div class="col-sm-auto col-md-auto col-lg-auto">
        <div class="product">
            <div class="product-img">
                <a href="#"><img class="p_img" src="<?php echo $rows['Book_img'];?>" alt=""></a>
            </div>

            <p class="product-title">
                <a href="#" class="book_name"> <?php echo $rows['Book_name'];?> </a>
                <a style="color: #A4A4A4; font-size: 0.6rem"><?php echo $author[0];?></a>
            </p>
            <div class="credit">
                <a style="font-size: 20px"><b><?php echo $rows['Book_price'];?>p.</b></a>
                <a href="dobasket.php?type=1&book_id=<?php echo $rows["Book_id"]; ?>"><button class="buy_button" >Купить</button></a>
            </div>
        </div>
    </div>
    <?php
}
?>
    </div>
    </div>
    </div>
    </div>
    </body>

<?php
include("footer.php");

$mysqli->close();
?>