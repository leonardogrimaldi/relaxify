import {addClass} from './tabs.js';


const registerForm = document.querySelector("main div section + section form");
const formDivs = registerForm.querySelectorAll("div");
const avanti = registerForm.querySelector("button");
const registrati = avanti.nextElementSibling;
console.log(registrati);
const group = 2;
let index = 0;

formDivs.forEach((d, i) => {
    if (i >= index && i < index + group) {
        console.log(d);
        addClass(d, "visible");
    } else {
        addClass(d, "hidden");
    }
});

avanti.addEventListener("click", () => {
    
})