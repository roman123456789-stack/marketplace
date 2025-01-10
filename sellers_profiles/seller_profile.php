<?php
    session_start();
    if (!isset($_SESSION["seller_fio"])) {
        header("Location: seller_sign_in.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="/styles/style_for_seller_profile.css"> -->
    <link rel="stylesheet" href="/styles/style_for_profile.css">
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <!-- <script src="seller_display_cards.js" defer></script> -->
    <script src="profile_display_cards.js" defer></script>
    <script src="profile_display_cards_after_submit.js" defer></script>
    <title>Профиль продавца</title>
</head>

<body>
    <div class="header" id="header">
        <div class="add-new-card"><a class="reference-in-header" href="seller_create_new_card.php">ДОБАВИТЬ КАРТОЧКУ</a><a class="image-in-header" href="seller_create_new_card.php"><img class="image-in-header" src="/styles/add_card.svg" alt=""></a></div>
        <form class="search-form" action="profile_search_cards.php" method="POST" id="search_form">
            <input class="search" type="text" placeholder="Поиск" name="search_input" id="search_input">
        </form>
        <?php
            $fio = $_SESSION["seller_fio"];
            echo '<a class="reference-in-header sellerFio" href = "/sellers_profiles/seller_profile.php">' . htmlspecialchars($fio) . '</a>';
        ?>
        </div>    
    </div>
    <div class="main-for-seller-profile" id="main-for-seller-profile">
        <div class="added-cards">Ваши каторточки товаров</div>
        <div id="common-card-wrapper">

        </div>

    </div>
    <div class="footer" id="footer">
        
    </div>
</body>
    <style>
        .add-new-card{
            padding-left: 10px;
        }
        .sellerFio{
            padding-right: 10px;
        }
        .added-cards{
           color: rgb(94, 94, 220);
           font-weight: 600;
           text-align: center;
           font-size: 25px;
        }
        .image-in-header{
            width: 60px;
            display: none;
            cursor: pointer;
        }
        .reference-in-header{
            color: white;
            text-decoration: none;
        }
        @media (max-width: 850px) {
            .sellerFio{
                display: none;
            }
            .image-in-header{
                display: block;
            }
            .reference-in-header{
                display: none;
            }
            .add-new-card{
                padding-left: 0px;
            }
            
        }
    </style>
</html>
