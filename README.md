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