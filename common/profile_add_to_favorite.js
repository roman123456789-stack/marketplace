document.getElementById("add-product-in-favorite").addEventListener('click', async ()=>{
    const product_id = document.getElementById("product_id_main").value;
    const client_id = '<?php echo $_SESSION["id"];?>';
    if (product_id && client_id) {
        try {
            const response = await fetch("/common/profile_add_to_favorite.php", {
                method: "POST", 
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ client_id: client_id, product_id: product_id })
            });
            console.log({ client_id: client_id, product_id: product_id });
            const result = await response.json();
            if (result.success) {
                if (result.message === "Товар уже был добавлен в избранное!") {
                    alert(result.message);
                }
                else{
                    alert("Товар добавлен в избранное!");
                }
            }
            else{
                alert("Ошибка! Попробуйте позже");                
            }
        } catch (error) {
            console.error("Ошибка при добавлении в избранное:", error);
        }
    }
})