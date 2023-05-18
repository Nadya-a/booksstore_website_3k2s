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
                <li><a>
                        <img src="img/favourite.png" class="header_images">
                    </a></li>
                <li><a>
                        <img src="img/cart.png" class="header_images">
                    </a></li>
                <li><a>
                        <img src="img/profile.png" class="header_images">
                    </a></li>
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
            <a style="color: white; border-bottom: 1px dashed white;">Казань — доставим 30 марта!</a>
        </div>
    </div>
</header>