<?php
    session_start();
    if (!isset($_SESSION['fio'])) {
        header("Location: /users_profiles/sign_in.html");
    }
    $data = json_encode(urldecode($_GET['data']), true);
    $images = json_encode(urldecode($_GET['images']), true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="profile_description_of_the_product_card.js" defer></script>
    <link rel="stylesheet" href="/styles/style_for_profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" defer></script>
    <script src="profile_display_cards.js" defer></script>
    <!-- <script src="profile_display_cards_after_submit.js" defer></script> -->
    <script src="profile_description_of_the_product_card.js" defer></script>
    <script src="profile_add_to_favorite.js" defer></script>
    <link rel="stylesheet" href="/styles/style_for_card_bio.css">

    <title>Описание товара</title>
</head>
<body>
    <div class="header">
        <div class="marketplace-name-for-card-description"> marketplace name </div>
        <!-- <form class="search-form" action="profile_search_cards.php" method="POST" id="search_form">
            <input class="search" type="text" placeholder="Поиск" name="search_input" id="search_input">
        </form> -->
        <!-- <div class="wrapper-for-sign">
            
        </div> -->
    </div>

    
    <div class="main">
        <div class="wrapper-for-card-bio">
            <div class="wrapper-for-main-card">
                <div class="wrapper-for-images">
                    <div class="product-images">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner" id="carousel-inner">
                                <!-- Фотки у товара -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" 1></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="wrapper-for-bio" id="wrapper-for-bio">
                    <!-- Описание товара -->
                </div>
            </div>
        </div>
        <div class="common-card-wrapper" id="common-card-wrapper"></div>
    </div>

    <div id="modal-window" class="modal-window">
        <div class="modal-window-content">
                
            <div class="pay-information">
                <form action="/common/profile_add_new_order.php" method="post">
                    <div class="head-information"><h2>Заказ</h2></div>
                    <div id="order-information" class="order-information"></div>
                    <div class="buyer-order"></div>
                    <div class="point-to-delivery">Выберите пункт выдачи</div>
                    <div id="card-to-pay" class="card-to-pay">Введите номер карты</div>
                    <input class="card" type="text" name="card" maxlength="16" pattern="[0-9]{16}" required>
                    <div class="wrapper-for-price">К оплате: &nbsp;<div id="foot-pay-information" class="foot-pay-information"></div></div>
                    <button type="submit" class="buy-product-now">Заказать</button>
                    <input id="id_product" class="hidden" type="hidden" name="product_id" value="0" required>
                </form>
            </div>
            
        </div>
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