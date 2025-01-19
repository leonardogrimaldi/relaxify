class DropDown extends HTMLElement {
    constructor() {
        super();

    }
    connectedCallback() {
        const template = document.getElementById('drop-down').content.cloneNode(true);
        let open = 0;
        const showButton = template.querySelector("article button");
        const dl = template.querySelector("article dl");
        [showButton, dl].forEach(e => {
            e.addEventListener("click", () => {
                if (open) {
                    showButton.nextElementSibling.classList.add("hidden")
                    showButton.querySelector("svg").classList.remove("rotate-180")
                } else {
                    showButton.nextElementSibling.classList.remove("hidden") 
                    showButton.querySelector("svg").classList.add("rotate-180")
                }
                open = !open;
            });
        });
        const tickButton = template.querySelector("div button")
        if (tickButton && tickButton instanceof HTMLButtonElement) {
            tickButton.addEventListener("click", () => {
                // chiama server aggiorna a inviato
            });
        }
        this.appendChild(template);
    }
}
customElements.define('drop-down', DropDown)
