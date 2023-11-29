const customDropdown = document.getElementById("customDropdown");
const dropdownButton = document.getElementById("dropdownContact");
const dropdownMenu = document.querySelector(".dropdown-menu");

customDropdown.addEventListener("mouseenter", () => {
  dropdownMenu.classList.add("show");
});

customDropdown.addEventListener("mouseleave", () => {
  dropdownMenu.classList.remove("show");
});
