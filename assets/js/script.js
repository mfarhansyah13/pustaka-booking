const navLink = document.querySelectorAll(".nav-link");

if(navLink.length) {
    navLink.forEach((link) => {
        link.addEventListener("click", function(e) {
            navLink.forEach((link) => {
                link.classList.remove("active");
            });
            e.preventDefault();
            link.classList.add("active");
        });
    });
}