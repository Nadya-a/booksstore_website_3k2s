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
                <button class="buy_button">Купить</button>
            </div>
        </div>
    </div>
    <?php
}
?>