const createDialog = document.querySelector("dialog");
const show = document.getElementById("create");
const close = createDialog.querySelector("button");
show.addEventListener("click", () => {
    createDialog.showModal();
});
close.addEventListener("click", () => {
    createDialog.close();
});

const modifyDialog = document.getElementById("modifyDialog");
const openModifyDialog = (item) => {
    fetch(`/prodotto.php?id=${item.dataset.codiceArticolo}&fetch=true`)
            .then(response => response.json())
            .then(data => {
                const obj = data[0];
                Object.keys(obj).forEach((k, i) => {
                    const input = document.getElementById("modify-" + k);
                    if (!(input instanceof HTMLInputElement && input.type == "file")) {
                        input.value = obj[k];
                    }
                });
                modifyDialog.showModal();
            })
            .catch(error => console.error('Error fetching product data:', error));
}
const closeModifyDialog = () => { modifyDialog.close(); modifyDialog.querySelector("form").reset();};
const deleteProduct = () => {
    const codiceArticolo = document.getElementById("modify-codice").value;
    // call function to delete product;
}