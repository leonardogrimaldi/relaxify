function validate_form() {
    'use strict'
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation')
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    }, false)
}

$(document).ready(function () {
    validate_form(); 
});

const updateTotal = () => {
    let total = 0;
    const items = document.querySelectorAll("article");
    items.forEach(item => {
        const price = parseFloat(item.querySelector("div p").textContent, 10);
        const quantity = parseInt(item.querySelector("div span").textContent, 10);
        total += price * quantity;
    });
    document.getElementById("totale-prodotti").textContent = total.toFixed(2) + "€";
}

updateTotal();