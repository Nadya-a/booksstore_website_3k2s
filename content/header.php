<?php
header("Cache-control: no-cache");
$id_bask=$_COOKIE["Order_id"];
if(! isset($id_bask))
{
    $uniq_ID=uniqid("ID");
    setcookie("Order_id", $uniq_ID, time()+60*60*24*14);
}
else
    setcookie("Order_id", $id_bask, time()+60*60*24*14);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="...css/styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<header class="header container-fluid">
    <div class="header__wrapper">
        <a href="mainpage.php" class="logo">
            <div class="header__logo_wrapper">
                <img src="img/logo.png" class="header__logo">
                <p style="margin-top: 12px; color: white">MyBook</p>
            </div>
        </a>

        <div class="header__list_wrapper" id="search">
            <div class="header__search_logo">
                <img src="img/lupe.png" style="width: 40px; height: 40px">
            </div>
            <div>
                <input type="search" class="header__search" placeholder="Поиск">
            </div>
        </div>

        <nav>
            <ul class="hr">
                <?php
                if(isset($_SESSION['login'])){

                    ?>
                    <li><a href="basket.php" style="text-decoration: none">
                            <img src="img/basket.png" class="header_images">
                        </a>
                    </li>
                    <li><a href="cabinet.php" style="text-decoration: none">
                            <img src="img/profile.png" class="header_images">
                        </a>
                    </li>
                    <li>
                        <a href="exit.php">
                            <img src="img/exit.png" class="header_images">
                        </a>
                    </li>

                    <?php
                }
                else{
                    ?>
                    <li>
                        <a href="login.php">
                            <img src="img/profile.png" class="header_images">
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </nav>
    </div>
    <hr id="hhr">
    <div class="header_info border-gradient border-gradient-green only-top container-fluid">
        <ul class="hh">
            <li><a href="mainpage.php#new" style="text-decoration: none; color: white">Новинки</a></li>
            <li><a href="mainpage.php#best" style="text-decoration: none; color: white">Хиты продаж</a></li>
            <li><a href="mainpage.php#cycles" style="text-decoration: none; color: white">Циклы</a></li>
            <li><a href="catalog.php" style="text-decoration: none; color: white">Каталог</a></li>
        </ul>
        <div id="date_info">
            <img src="img/location_icon.png" style="width: 24px; height: 30px;padding-bottom: 6px">
            <a style="color: white; border-bottom: 1px dashed white;">Казань — доставим 30 мая!</a>
        </div>
    </div>
</header>