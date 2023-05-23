<?php
session_start();
include ("header.php")?>

<?php

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




$id_bask=$_COOKIE["Order_id"];
$title="Ваша корзина";



$strSQL1="SELECT COUNT(*) as count FROM orderlist WHERE Order_id='".$id_bask."' ";
$result1=mysqli_query($conn, $strSQL1) or die("");
$row=mysqli_fetch_array($result1);
if($row["count"]==0){
?>
    <h3 style="width: 600px; margin-left: 34%; margin-top: 30px; margin-bottom: 50px">В корзине пока нет товаров!</h3>
<div class="body">

    <?php }
    else
    {
        $strSQL1="SELECT Book_name, Book_img, Book_price, author.Author_name, book.Author_id, orderlist.Book_id, kolvo, Order_id FROM book, author, orderlist WHERE orderlist.Book_id=book.Book_id AND orderlist.Order_id='".$id_bask."' AND book.Author_id=author.Author_id";
        $result1=mysqli_query($conn, $strSQL1) or die("");
    }
    ?>
    <?php
    $sum=0;
    $discount=0;
    ?>
    <div class="column_lines">
        <div class="catalog_new container-fluid">
            <div class="products container-fluid">
                <div class="row">

                    <?php while ($rows=mysqli_fetch_array($result1)){ ?>


                        <div class="col-sm-auto col-md-auto col-lg-auto">
                            <div class="product">
                                <div class="product-img">
                                    <a href="#"><img class="p_img" src="<?php echo $rows['Book_img'];?>" alt=""></a>
                                </div>

                                <p class="product-title">
                                    <a href="#" class="book_name"> <?php echo $rows['Book_name'];?> </a>
                                    <a style="color: #A4A4A4; font-size: 0.6rem"><?php echo $rows['Author_name'];?></a>
                                </p>
                                <div class="credit">
                                    <a style="font-size: 20px"><b><?php echo $rows['Book_price'];?>p.</b></a>
                                    <a style="text-decoration: none; color: black" href="dobasket.php?type=1&book_id=<?php echo $rows["Book_id"]; ?>">+</a>
                                    <b><?php echo $rows["kolvo"]; ?></b>
                                    <a style="text-decoration: none; color: black" href="dobasket.php?type=2&book_id=<?php echo $rows["Book_id"]; ?>">-</a>
                                    <a href="dobasket.php?type=3&book_id=<?php echo $rows["Book_id"]; ?>"><img src="img/delete.png" style="width: 26px; height: 26px"></a>
                                </div>

                            </div>
                        </div>
                        <?php $sum=$sum+$rows["Book_price"]*$rows["kolvo"]; ?>
                    <?php }?>
                </div>

            </div>
        </div>
    </div>
</div>
<a style="margin-left: 44%; margin-top: 10px; margin-bottom: 20px href="dobasket.php?type=4&book_id=1"><button class="buy_button">Очистить корзину</button></a><br>
<h4 style="text-decoration: none; color: black; margin-left: 41%"><span>Сумма заказа: </span><?php  print $sum;?> ₽</h4>

<?php
$strSQL1="SELECT COUNT(*) as count FROM orderlist WHERE Order_id=1 ";
$result1=mysqli_query($conn, $strSQL1) or die("");
$row=mysqli_fetch_array($result1);
if($row["count"]!=0){ ?>
 <!--   <section>
        <a class="btn-ord" href="order.phtml">Оформить заказ</a>
    </section> -->
    </div>






<?php } ?>
