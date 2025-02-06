// Handle fixed div overlapping footer
const footer = document.querySelector("footer");
const fixedDiv = document.getElementById('fixed-div');
const cartMessage = document.getElementById('cartMessage');
const setFooterMargin = () => {
    if (this.document.body.clientWidth >= 640) {
        footer.style.marginBottom = '0px';
        cartMessage.style.marginBottom = '0px';
    } else {
        footer.style.marginBottom = `${fixedDiv.clientHeight}px`;
        cartMessage.style.marginBottom = `${fixedDiv.clientHeight}px`;
    }
}
setFooterMargin();
window.addEventListener("resize", function(event) {
    setFooterMargin();
})