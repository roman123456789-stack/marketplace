<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style_for_profile.css">
    <script src="/common/profile_display_client_orders.js" defer></script>
    <title>Ваши избранные товары</title>
</head>
<body>
<div class="header">
        <div class="marketplace-name"> marketplace name </div>
        <form class="search-form" action="profile_search_cards.php" method="POST" id="search_form">
            <input class="search" type="text" placeholder="Поиск" name="search_input" id="search_input">
        </form>
        <div class="wrapper-for-sign-in">
            <?php
                if (isset($_SESSION['fio'])) {
                    echo '<a href="/common/profile_display_client_orders.php" class="sign-in">'. $_SESSION['fio'] . '</a>';
                } else {
                    echo '<a href="/users_profiles/sign_in.html" class="sign-in"><img src="/styles/sign_in_second_variant.svg" style = "width: 30px; height: 30px" alt=""></a>';
                    echo '<a href="/users_profiles/sign_in.html" class="sign-in">Войти</a>';
                }
            ?>
        </div>
        <div class="menu-in-header"><img class="menu-in-header" src="/styles/images/menu.svg" alt=""></div>
    </div>
    <div class="main">
        <h3 class="h3-client-orders">Ваши заказы</h3>
        <div id="common-card-wrapper"></div>
    </div>
    <div class="footer">
        <a href="/common/profile.php" class="footer-link" target="_blank">
            <img src="/styles/images/home.svg" alt="Icon 1" class="footer-icon">
        </a>
        <a href="" class="footer-link" target="_blank">
            <img src="/styles/images/card.svg" alt="Icon 2" class="footer-icon">
        </a>
        <a href="/common/profile_display_client_orders.php" class="footer-link" target="_blank">
            <img src="/styles/images/shopping-card.svg" alt="Icon 3" class="footer-icon">
        </a>
        <a href="/common/profile_display_favorite_cards.php" class="footer-link" target="_blank">
            <img src="/styles/images/favorite.svg" alt="Icon 4" class="footer-icon">
        </a>
    </div>
</body>
</html>
<style>
    .h3-client-orders{
        color: rgb(94, 94, 220);
        text-align: center;
    }
</style>
<script>
    document.getElementById("search_form").addEventListener('click', ()=>{
    window.location.href = "/common/profile.php";
    })
</script>