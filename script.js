const textAnim = document.querySelector('h1');
new Typewriter(textAnim, {
    deleteSpeed: 20
})
.changeDelay(20) 
.typeString('Hi,<br> I\'am Ahmed')
.pauseFor(300)
.typeString('<span style="color: #E55E34"><br> Developpeur web </span>')
.start();


window.addEventListener("scroll", () => {
    let scrollValue = (window.scrollY + window.innerHeight) / document.body.offsetHeight;
    const profil = document.querySelector(".profil-right-container")
    if (scrollValue > 0.40) {
        profil.style.opacity = 1;
        profil.style.transform = "none";    }
});

const navbar = document.getElementById("navbar");
BigInt.addEventListener("click", () => {
    navbar.classList.toggle("active");
})