(function () {
    let id;
    function getDataFromSearch() {
        const urlParams = new URLSearchParams(window.location.search);
        const dataParam = urlParams.get('data');
        const data = dataParam ? JSON.parse(decodeURIComponent(dataParam)) : null;
        // console.log(data);
        return data;
    }
    function getImagesFromSearch() {
        const urlParams = new URLSearchParams(window.location.search);
        const imagesParam = urlParams.get('images');
        const images = imagesParam ? JSON.parse(decodeURIComponent(imagesParam)) : null;
        // console.log(images);
        return images;
    }
    async function renderImagesInMainCard(imagePath) {
        const wrapper_for_images = document.getElementById("carousel-inner");
        let imageResponseByFunction = await getImagesFromSearch();
        let imagesWithTags = "";
        // console.log(images);
        imageResponseByFunction.forEach((image, index, array)=>{
            if (index === array.length - 1) {
                imagesWithTags += `<div class="carousel-item">
                    <img src="${image["image_path"]}" class="d-block w-100" alt="...">
                </div>`;
            }
            if (index === 0) {
                imagesWithTags += `<div class="carousel-item active" data-bs-interval="2000">
                    <img src="${image["image_path"]}" class="d-block w-100" alt="...">
                </div>`;  
            }
            else if (index !== array.length - 1 && index !== 0){
                imagesWithTags += `<div class="carousel-item" data-bs-interval="2000">
                    <img src="${image["image_path"]}" class="d-block w-100" alt="...">
                </div>`;
            }
        });
        wrapper_for_images.innerHTML = imagesWithTags;

    }
    async function renderDataInMainCard(imagePath) {
        const wrapper_for_data = document.getElementById("wrapper-for-bio");
        let dataResponseByFunction = await getDataFromSearch();
        let dataWithTags = "";
        console.log(dataResponseByFunction);
            dataWithTags += `<div class="card-bio" id="card-bio">${dataResponseByFunction["bio"]}</div>
                <div class="wrapper-for-price">
                    <div id="price-now" class="price-now">${dataResponseByFunction["price_now"]} </div>
                    <div id="price-previos" class="price-previos">${dataResponseByFunction["price_previos"]}</div>
                </div>
                <button class="buy-product-now" id="buy-product-now">Заказать</button>
                <button class="buy-product-now" id="add-product-in-favorite">Добавить в избранное</button>
                <input id="product_id_main" class="product-id" name="product_id" type="hidden" value="${dataResponseByFunction["product_id"]}">`;
            let id_product_in_function = `${dataResponseByFunction["product_id"]}`;        
            wrapper_for_data.innerHTML = dataWithTags;

            const id_product_input = document.getElementById("id_product");
            id_product_input.value = id_product_in_function;
            const btnToBuy = document.getElementById("buy-product-now");
            const modal = document.getElementById("modal-window");
            const order = document.getElementById("order-information");
            const bio = document.getElementById("card-bio");
            const to_pay = document.getElementById("foot-pay-information");
            const price = document.getElementById("price-now");
            btnToBuy.addEventListener('click', ()=>{
                modal.style.display = 'flex';
            })
            order.textContent = bio.textContent;
            to_pay.textContent = price.textContent;
        return id_product_in_function;
    }
    renderImagesInMainCard();
    renderDataInMainCard();
})();



