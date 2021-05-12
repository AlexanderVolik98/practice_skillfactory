<?php
session_start();


if (!isset($_SESSION['user_role'])) {
    header('Location: /');
}

if ($_SESSION['user_role'] === 'user') {
    echo '<h2>добро пожаловать, авторизованный пользователь!</h2>';
}

if ($_SESSION['user_role'] === 'admin') {
    echo '<h2>добро пожаловать, админ!</h2>';
}

if ($_SESSION['user_role'] == 'user_VK') {
    echo '<h2>добро пожаловать, авторизованный пользователь VK!</h2>';
    ?>

    <img src="public/img/laugh.gif" alt="">

    <?php
}

?>