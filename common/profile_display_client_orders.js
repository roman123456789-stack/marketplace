function renderAllCards() {
    
    const wrapper = document.getElementById('common-card-wrapper');
    let cardsHTML = "";
    let i = 0;
    
    
    getDataFromDatabase();
    
    // wrapper.innerHTML = cardsHTML;
    
    function renderingCards(image_path, price_now_for_function, price_prev_for_function, product_bio_for_function, company_name_for_function, product_id__for_function){
        cardsHTML += 
        `<a class="a-wrapper-for-card" href="profile_search_target_card_after_click.php?id=${product_id__for_function}"><div id="wrapper-for-card">
        <div class="image"><img class="image" src="${image_path}"></div>
        <div class="wrapper-for-price">
        <div class="price-now" id="price1-now-${i}">${price_now_for_function}</div>
        <div class="price-previos" id="price-prev-${i}">${price_prev_for_function}</div>
        </div>
        <div class="name-company" id="name-company-${i}"><img src = "/styles/verifed.svg" class="verifed">${company_name_for_function}</div>
        <div class="product-bio" id="product-bio-${i}">${product_bio_for_function}</div>
        <button class="product-card-btn" id="product-card-${i}">Заказать</button>
        <input type="hidden" value="${product_id__for_function}" id="product_id">
        </div></a>`;
        i++;
    }
    
    
    //renderingCards();
    
    async function getDataFromDatabase(){
    
        let price_now;
        let price_prev;
        let product_bio;
        let company_name;
    
    
        const response = await fetch("/common/profile_search_client_orders.php");
        const products = await response.json();
        console.log(products);
    
        products.forEach(product => {
            price_now = product.price_now;
            price_prev = product.price_previos;
            product_bio = product.bio;
            company_name = product.company_name;
            image_path = product.image_path;
            product_id = product.product_id;
            renderingCards(image_path, price_now, price_prev, product_bio, company_name, product_id);
        });
        wrapper.innerHTML = cardsHTML;
    }
}
window.onload = renderAllCards;
