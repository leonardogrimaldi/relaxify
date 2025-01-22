// Handle fixed div overlapping footer
const footer = document.querySelector("footer");
const fixedDiv = document.getElementById('fixed-div');
footer.style.marginBottom = `${fixedDiv.clientHeight}px`;