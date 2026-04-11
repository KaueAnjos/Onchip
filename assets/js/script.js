// Navbar Transition

window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");

    if (window.scrollY > 10) {
        navbar.classList.add("show");
    } else {
        navbar.classList.remove("show");
    }
});

// Reset page onclick logo
function resetPage() {
    document.addEventListener('click', () => {
        location.reload()
    })
}

// Loader
window.addEventListener("load", function () {
    const loader = document.getElementById("loader-overlay");

    // pequeno delay pra suavizar
    setTimeout(() => {
        loader.classList.add("hidden");
    }, 500);
});