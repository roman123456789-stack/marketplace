console.log("Скрипт работает!");

let subcategories = [];
let categories = [];

var categorySelect = document.getElementById('category'); //КАТЕГОРИЯ
var subcategorySelect = document.getElementById("subcategory"); //ПОДКАТЕГОРИЯ

async function getSubcategories() {
    try {
        const response = await fetch('/sellers_profiles/seller_get_subcategories.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json(); 
        subcategories = data; 
        console.log("Данные загружены"); 
        return subcategories; 
    } catch (error) {
        console.error("Ошибка при загрузке данных:", error);
    }
}
async function getCategories() {
    try {
        const response = await fetch('/sellers_profiles/seller_get_categories.php');
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json(); 
        categories = data; 
        console.log("Данные загружены"); 
        return categories; 
    } catch (error) {
        console.error("Ошибка при загрузке данных:", error);
    }
}
async function renderCategoriesAndSubcategories() {
    
    await getSubcategories();
    await getCategories();
    console.log(subcategories);
    console.log(categories);

    categories.forEach(category => {
        let option = document.createElement("option");
        option.value = category["category_id"];
        option.textContent = category["category_name"];
        categorySelect.appendChild(option);
    })
    
    updateSubcategories();
    categorySelect.addEventListener("change", updateSubcategories);
}

function updateSubcategories(){
    let selectedCategoryId = categorySelect.value;
    console.log(selectedCategoryId);
    let filteredSubcategories = subcategories.filter(subcategory => {return subcategory["category_id"] == selectedCategoryId})
    subcategorySelect.innerHTML = "";
    console.log(filteredSubcategories);
    filteredSubcategories.forEach(subcategory =>{
        let option = document.createElement("option");
        option.value = subcategory["subcategory_id"];
        option.textContent = subcategory["subcategory_name"];
        subcategorySelect.appendChild(option);
    })
}

renderCategoriesAndSubcategories();