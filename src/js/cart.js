function updateTotal() {
    let total = 0;
    const items = document.querySelectorAll(".cart-item");
    items.forEach(item => {
        const price = parseFloat(item.getAttribute("data-price"));
        const id = item.id.split("-")[1];
        const quantity = parseInt(document.getElementById(`quantity-${id}`).textContent, 10);
        total += price * quantity;
    });
    document.getElementById("totale-prodotti").textContent = total.toFixed(2) + "€";
}

function incrementQuantity(id) {
    const quantityElement = document.getElementById(`quantity-${id}`);
    let quantity = parseInt(quantityElement.textContent, 10);
    quantityElement.textContent = quantity + 1;
    updateTotal();
}

function decreaseQuantity(id) {
    const quantityElement = document.getElementById(`quantity-${id}`);
    let quantity = parseInt(quantityElement.textContent, 10);
    if (quantity > 1) {
        quantityElement.textContent = quantity - 1;
        updateTotal();
    }
}

function removeItem(id) {
    const itemElement = document.getElementById(`item-${id}`);
    itemElement.remove();
    updateTotal();
}

window.onload = updateTotal;