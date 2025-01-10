console.log("Скрипт работает!");

const wrapper = document.getElementById('common-card-wrapper');
let cardsHTML = "";
let i = 0;



getDataFromDatabase();

// wrapper.innerHTML = cardsHTML;

function renderingCards(price_now_for_function, price_prev_for_function, product_bio_for_function){
    cardsHTML += 
    `<div id="wrapper-for-card">
        <div class="image">Product image</div>
        <div class="wrapper-for-price">
            <div class="price-now" id="price1-now-${i}">${price_now_for_function}</div>
            <div class="price-previos" id="price-prev-${i}">${price_prev_for_function}</div>
        </div>
        <div class="product-bio" id="product-bio-${i}">${product_bio_for_function}</div>
        <button class="product-card-btn" id="product-card-${i}">Купить</button>
    </div>`;
    i++;
}

async function getDataFromDatabase(){

    let price_now;
    let price_prev;
    let product_bio;


    const response = await fetch("seller_searching_seller_cards.php");
    const products = await response.json();
    console.log(products);

    products.forEach(product => {
        price_now = product.price_now;
        price_prev = product.price_previos;
        product_bio = product.bio;
        renderingCards(price_now, price_prev, product_bio);
    });
    wrapper.innerHTML = cardsHTML;
}
