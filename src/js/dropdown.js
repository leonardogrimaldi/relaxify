let activeDropdown;
const dropdownClicked = (item) => {
    if (item instanceof HTMLButtonElement) {
        if (activeDropdown && activeDropdown !== item) {
            activeDropdown.click();
        }
        if (activeDropdown === item) {
            activeDropdown = null;
            item.nextElementSibling.classList.add("hidden")
            item.querySelector("svg").classList.remove("rotate-180")
        } else {
            activeDropdown = item;
            item.nextElementSibling.classList.remove("hidden");
            item.querySelector("svg").classList.add("rotate-180");
        }
    }
}

const tickSent = (item) => {
    if (item instanceof HTMLButtonElement) {
        // segnaInviato(item.dataset.codiceArticolo);
        item.remove();
    }
}

const tickReceived = (item) => {
    if (item instanceof HTMLButtonElement) {
        // segnaInviato(item.dataset.codiceArticolo);
        item.remove();
    }
}
