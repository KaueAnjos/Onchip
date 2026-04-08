window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");

    if (window.scrollY > 10) {
        navbar.classList.add("show");
    } else {
        navbar.classList.remove("show");
    }
});