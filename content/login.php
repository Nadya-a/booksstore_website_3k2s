<?php
session_start();
include ("header.php")?>

<div>
    <h3 style="margin-top: 2rem; margin-bottom: 2rem; margin-left: 42%">Авторизация</h3>
    <section class="log" id="log">

        <div class="row">
            <form action="auto.php" method="post">
                <input type="text" name="login" value="" placeholder="Логин" class="box"> <br><br>
                <input type="password" name="pass" value="" placeholder="Пароль" class="box"><br><br>
                <input type="submit" value="Войти" class="btn" style="background: #CE633E; color: white; font-weight: bolder; margin-left: 2rem; margin-right: 1rem">
                <a  href="registration.php" class="btn" style="background: #A4A4A4; font-weight: bolder;">Регистрация</a>
            </form>

        </div>

    </section>
</div>
<?php
include ("footer.php");
?>

