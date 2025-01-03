export const addClass = (e, classes) => {
    if (e instanceof HTMLElement) {
        classes.trim().split(" ").forEach(c => e.classList.add(c));
    }
}
export const removeClass = (e, classes) => {
    if (e instanceof HTMLElement) {
        classes.trim().split(" ").forEach(c => e.classList.remove(c));
    }
}

const menu = document.querySelector("main menu");
const buttons = menu.querySelectorAll("li button");
const activeStyle = "border-4 border-pink-200 text-pink-500";
let active = 0;
addClass(buttons[0], activeStyle);
document.querySelector(`menu ~ *[tab-name="${buttons[active].getAttribute("tab-name")}"]`).classList.remove("hidden");

buttons.forEach((b, i) => {
    if (b instanceof HTMLButtonElement) {
        b.addEventListener("click", () => {
            removeClass(buttons[active], activeStyle);
            document.querySelector(`menu ~ section[tab-name="${buttons[active].getAttribute("tab-name")}"]`).classList.add("hidden");
            active = i;
            addClass(b, activeStyle);
            document.querySelector(`menu ~ section[tab-name="${buttons[active].getAttribute("tab-name")}"]`).classList.remove("hidden");
        });
    }
});