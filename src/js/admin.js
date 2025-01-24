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
    const obj = retrieveItemData(item.dataset.codiceArticolo)
    Object.keys(obj).forEach((k, i) => {
        const input = document.getElementById("modify-" + k);
        if (!(input instanceof HTMLInputElement && input.type == "file")) {
            input.value = obj[k];
        }
    });
    modifyDialog.showModal();
}
const closeModifyDialog = () => { modifyDialog.close(); modifyDialog.querySelector("form").reset();};
const deleteProduct = () => {
    const codiceArticolo = document.getElementById("modify-codice").value;
    // call function to delete product;
}
const retrieveItemData = function (codiceArticolo) {
    // get data from server
    const obj = { codice: 1234, nome: "Bro", categoria: "test", prezzo: 30, quantita: 20, descrizione: "lorem ipsum", immagine: "./test-path.jpg", alt: "un cane" };
    return obj;
}