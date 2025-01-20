class Ordine {
    codice = "";
    stato = "N/A";
    indirizzo = "Via dell'Università 45, Cesena (FC)";
}
class DropDown extends HTMLElement {
    ordine = new Ordine();
    constructor() {
        super();
        this._ordine = new Ordine();
    }

    get orderData() {
        return this._ordine;
    }

    set orderData(o) {
        this._ordine = o;
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
                tickButton.remove();
                showButton.click();
                // chiama server aggiorna a inviato
            });
        }
        Object.keys(this._ordine).forEach((k,i) => {
            template.querySelector(`slot[name="${k}"]`).textContent = this._ordine[k];
        })
        this.appendChild(template);
    }
}
customElements.define('drop-down', DropDown)
