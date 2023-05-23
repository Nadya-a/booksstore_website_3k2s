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

$sql = " SELECT * FROM book ORDER BY Book_id";
$sql1 = " SELECT * FROM book ORDER BY Book_id DESC ";
$result = $mysqli->query($sql);
?>

<?php
include("header.php");
?>
    <!-- End -->

    <div id="menu">
        <div id="carouselProductControls" class="carousel slide product__carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active product__carousel-item item1">
                    <img src="img/bootstrap_pic1.jpg" class="d-block w-100 product__carousel_img_1"
                         alt="carousel_image">
                    <div class="carousel_content">
                        <div class="text_info">
                            <div class="info_title">Загляни в себя</div>
                            <div class="info_text">Скидки до <b>30%</b> на подборки книг о самооценке, личной эффективности и не только</div>
                        </div>
                        <button class="carousel-button">Купить</button>
                    </div>

                </div>
                <div class="carousel-item product__carousel-item">
                    <img src="img/bootstrap_pic22.jpg" class="d-block w-100 product__carousel_img_2"
                         alt="carousel_image">
                    <div class="carousel_content2" style="padding: 2rem;">
                        <div class="text_info">
                            <div class="info_title" style="color: #222224;">Что почитать?</div>
                            <div class="info_text" style="color: #222224;">Наша редакция специально собрала коллекцию — в ней собрана литература с самыми хорошими отзывами!</div>
                        </div>
                        <button class="carousel-button" style="margin-top: 1rem;">Перейти</button>
                    </div>
                </div>
                <div class="carousel-item product__carousel-item">
                    <img src="img/bootstrap_pic3.jpg" class="d-block w-100 product__carousel_img_3"
                         alt="carousel_image">
                    <div class="carousel_content2">
                        <div class="text_info">
                            <div class="info_title"  style="color: #222224;">Ведьмина служба доставки</div>
                            <div class="info_text"  style="color: #222224;">Спешите узнать уникальную историю девочки, работающей по ведьминской профессии</div>
                        </div>
                        <button class="carousel-button">Перейти</button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductControls"
                    data-bs-slide="prev">
                <i class="fas fa-angle-left product__icon"></i>
                <span class="carousel-control-prev-icon product__carousel_icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductControls"
                    data-bs-slide="next">
                <i class="fas fa-angle-right product__icon"></i>
                <span class="carousel-control-next-icon product__carousel_icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div id="best" class="column_lines" style="padding-bottom: 1rem;">
            <div class="catalog_new container-fluid">
                <div class="products container-fluid">
                    <!--   <div class="row row-cols-1">
                           <div class="col">
                               <div class="head_row"><a style="font-size: 20px"><b>Новинки</b></a></div>
                           </div>
                       </div> -->
                    <div class="row_info">
                        <a style="font-size: 22px"><b>Лучшие из лучших</b></a>
                    </div>
                    <div class="row"> <!-- row-cols-5 -->
                        <?php
                        // LOOP TILL END OF DATA
                        while($rows=$result->fetch_assoc())
                        {
                            if ($rows['Book_id']==7) {
                                break;
                            }
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
                                        <a href="#"  class="book_name"> <?php echo $rows['Book_name'];?> </a>
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
                        $result->free();
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="new" class="column_line">
            <div class="catalog_new container-fluid">
                <div class="products container-fluid">
                    <!--   <div class="row row-cols-1">
                           <div class="col">
                               <div class="head_row"><a style="font-size: 20px"><b>Новинки</b></a></div>
                           </div>
                       </div> -->
                    <div class="row_info">
                        <a style="color: #eeeeee; font-size: 22px"><b>Новинки литературы</b></a>
                    </div>
                    <div class="row"> <!-- row-cols-5 -->
                            <?php
                            // LOOP TILL END OF DATA
                            $result = $mysqli->query($sql1);
                            while($rows=$result->fetch_assoc())
                            {
                                if ($rows['Book_id']==6) {
                                    break;
                                }
                                $a=$rows['Author_id'];
                                $aut = "SELECT Author_name FROM author WHERE Author_id='$a'";
                                #$aa=$mysqli->query($aut);
                                #$aaa=mysqli_fetch_row($aa);
                                $author=mysqli_fetch_row($mysqli->query($aut));
                                ?>

                                <div class="col-sm-auto col-md-auto col-lg-auto">
                                    <div class="product_newes">
                                        <div class="product-img">
                                            <a href="#"><img class="p_img" src="<?php echo $rows['Book_img'];?>" alt=""></a>
                                        </div>

                                        <p class="product-title">
                                            <a href="#" style="color: white" class="book_name"> <?php echo $rows['Book_name'];?> </a>
                                            <a style="color: white; font-size: 0.6rem"><?php echo $author[0];?></a>
                                        </p>
                                        <div class="credit">
                                            <a class="price_newes"><b><?php echo $rows['Book_price'];?>p.</b></a>
                                            <button class="buy_button_newes">Купить</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $result->free();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="cycles" class="column_lines">
            <div class="catalog_new container">
                <div class="products container-fluid">
                    <div class="row_info">
                        <a style="font-size: 22px"><b>Книжные циклы</b></a>
                    </div>
                    <div class="row"> <!-- row-cols-5 -->
                        <div class="col-sm-auto col-md-auto col-lg-auto">
                            <div class="product_cycle">
                                <div class="product_cycle-img">
                                    <a href="#"><img class="p_c_img" src="img/books/атакатитанов.png" alt=""></a>
                                </div>
                                <p class="product_cycle-title">
                                    <a href="#"  style="text-decoration:none; font-size: 1rem">Атака титанов</a>
                                    <a style="color: #A4A4A4">Борьба человечества с ужасными титанами</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-auto col-md-auto col-lg-auto">
                            <div class="product_cycle">
                                <div class="product_cycle-img">
                                    <a href="#"><img class="p_c_img" src="img/books/ведьминаслужба.png" alt=""></a>
                                </div>
                                <p class="product_cycle-title">
                                    <a href="#"  style="text-decoration:none; font-size: 1rem">Ведьмина служба доставки</a>
                                    <a style="color: #A4A4A4">Маленькая ведьмочка учится помогать людям</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-auto col-md-auto col-lg-auto">
                            <div class="product_cycle">
                                <div class="product_cycle-img">
                                    <a href="#"><img class="p_c_img" src="img/books/токийскийгуль.png" alt=""></a>
                                </div>
                                <p class="product_cycle-title">
                                    <a href="#"  style="text-decoration:none; font-size: 1rem">Токийский гуль</a>
                                    <a style="color: #A4A4A4">Фантастическая драма о противостоянии людей и гулей</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include("footer.php");

$mysqli->close();
?>