const updateTotal = () => {
    let total = 0;
    const items = document.querySelectorAll("article");
    items.forEach(item => {
        const price = parseFloat(item.querySelector("div p").textContent, 10);
        const quantity = parseInt(item.querySelector("div div span").textContent, 10);
        total += price * quantity;
    });
    document.getElementById("totale").textContent = total.toFixed(2) + "€";
}

const incrementQuantity = (item) => {
    if (item instanceof HTMLButtonElement) {
        quantityElement = item.parentNode.querySelector("span");
        const quantity = parseInt(quantityElement.textContent, 10);
        quantityElement.textContent = quantity + 1;
        updateTotal();
    }
}

const decreaseQuantity = (item) => {
    if (item instanceof HTMLButtonElement) {
        quantityElement = item.parentNode.querySelector("span");
        const quantity = parseInt(quantityElement.textContent, 10);
        if (quantity > 1) {
            quantityElement.textContent = quantity - 1;
            updateTotal();
        }
    }
}

const removeItem = (item) => {
    if (item instanceof HTMLButtonElement) {
        const codiceArticolo = item.dataset.codiceArticolo;
        document.querySelector(`article[data-codice-articolo='${codiceArticolo}']`)?.remove();
        updateTotal();
        checkEmptyCart();
    }
}

const checkEmptyCart = () => {
    if (document.querySelectorAll("article").length == 0) {
        document.querySelectorAll("section").forEach(element => {
            element.remove();
        });
        document.getElementById("emptyText").classList.remove("hidden");
    } 
}

updateTotal();