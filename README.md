This marketplace project includes several user roles: Buyer, Seller, and Employee.
Functionality:
    Customer: 
        The customer can view product cards and order the one they like, as well as add it to favorites, view favorites and a list of orders, and search for cards by name on the website.
    Seller:
        Can add new product cards that will be listed under his name, the product card that the seller adds includes:
            1) Photos of the card 
            2) Product Name 
            3) Product Description
            4) Category and subcategory
            5) The price of the product with and without a discount Product Card is displayed on the user's profile page. Product cards are also displayed on the Buyer's page.
    Employee:
        Can add new employees and remove old ones if they are not the director.
Highlights:
The database schema can be viewed in the /scheme folder, photos from sellers are uploaded to the /product_images folder with unique names, and paths for these images are uploaded to the database. This is done so that the database does not depend on the number of images. All entities have implemented the registration/login functionality. The site also has an adaptive layout. Product categories are stored in the database, and it is possible for employees to add new categories and subcategories. All cards are dynamically generated with js and php.

Этот проект маркетплейса включает в себя несколько ролей пользователей: Покупатель, Продавец, Сотрудник.
    Функционал:
        Покупатель: 
            Покупатель может смотреть карточки товаров и заказать понравившуюся, а также добавить ее в избранное, посмотреть избранное и список заказов, искать на сайте карточки по названию.
        Продавец:
            Может добавлять новые карточки товаров, которые будут числиться под его именем, карточка товара, которую добавляет продавец включает в себя:
                1) Фотографии карточки 
                2) Название продукта 
                3) Описание продукта
                4) Категорию и подкатегорию
                5) Цену товара со скидкой и без Карточки товара пользователя отображаются на странице его профиля. Также карточки товаров  отображаются на странице Покупателя.
        Сотрудник:
            Может добавлять новых сотрудников и удалять старых, если они не являются директором.
Основные моменты:
Схему базы данных можно посмотреть в папке /scheme, фотографии от продавцов загружаются в папку /product_images с уникальными именами, в базу данных загружаются пути для этих изображений. Это сделано для того, чтобы работа базы данных не зависела от количества изображений. У всех сущностей реализован функционал регистрации/входа. Также на сайте реализована адаптивная верстка. Категории товаров хранятся в базе данных, возможен фунционал добавления новых категорий и подкатегорий сотрудниками. Все карточки динамически генерируются с js и php.
