class DropDown extends HTMLElement {
    constructor() {
        super();

    }
    connectedCallback() {
        const template = document.getElementById('drop-down').content.cloneNode(true);
        let open = 0;
        const showButton = template.querySelector("article button");
        showButton.addEventListener("click", () => {
            if (open) {
                showButton.nextElementSibling.classList.add("hidden")
                showButton.querySelector("svg").classList.remove("rotate-180")
            } else {
                showButton.nextElementSibling.classList.remove("hidden") 
                showButton.querySelector("svg").classList.add("rotate-180")
            }
            open = !open;
        });
        this.appendChild(template);
    }
}

customElements.define('drop-down', DropDown)
