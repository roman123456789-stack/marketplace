<?php
    session_start();
    if (empty($_SESSION["seller_fio"])) {
        header("Location: /sellers_profiles/seller_sign_in.html");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить новую карточку</title>
    <link rel="stylesheet" href="/styles/style_for_seller_profile.css">
    <script src="subcategories.js" defer></script>
</head>
<body>
    <div class="header" id="header">
        <div class="inHeaderItem1">ДОБАВЛЕНИЕ КАРТОЧКИ</div>
        <?php
            $fio = $_SESSION["seller_fio"];
            echo '<a class="sellerFio" href="seller_profile.php">' . htmlspecialchars($fio) . '</a>'; 
        ?>
    </div>    

    <div class="main" id="main">
        <div class="forForm">
            <form action="seller_add_new_card.php" method="post" class="formForInsertNewCard" enctype="multipart/form-data">
                <label for="photos">Выберите фотографии</label>
                <input type="file" name="images[]" multiple accept="image/*" id="photos">
                
                <label for="category">Выберите категорию</label>
                <select name="category" id="category"></select>
                
                <label for="subcategory">Выберите подкатегорию</label>
                <select name="subcategory" id="subcategory"></select>
                
                <label for="title">Введите название</label>
                <input type="text" placeholder="Название продукта" name="title" id="title">
                
                <label for="bio">Введите описание</label>
                <input type="text" placeholder="Описание продукта" name="bio" id="bio">
                
                <label for="prev">Введите цену до скидки</label>
                <input type="number" min="0" placeholder="0 RUB" name="prev" id="prev">
                
                <label for="now">Введите цену после скидки</label>
                <input type="number" min="0" placeholder="0 RUB" name="now" id="now">
                
                <button type="submit" class="btnInForm" id="btnInForm">СОЗДАТЬ</button>

                <input type="hidden" value="" id="subcategory-text" name="subcategory-text">

            </form>
        </div>
    </div>
</body>
</html>
<script>
    const btn = document.getElementById("btnInForm");
    const _subcategorySelect = document.getElementById("subcategory");
    const subcategoryTextInput = document.getElementById("subcategory-text");
    btn.addEventListener('click', ()=>{
        subcategoryTextInput.value = _subcategorySelect.options[_subcategorySelect.selectedIndex].value;
    });
</script>

