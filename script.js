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
    const profil = document.querySelector(".profil-right-container");
    const img = document.getElementById("question");
  
    if (scrollValue > 0.30) {
      profil.style.opacity = 1;
      profil.style.transform = "none";
    }
  
    if (scrollValue > 0.50) {
      // Arrête l'animation "blink" en supprimant la classe "blink-animation"
      img.classList.remove("blink-animation");
    } else {
      // Si scrollValue est inférieur ou égal à 0.50, ajoute l'animation "blink"
      img.classList.add("blink-animation");
    }
  });
  
  

const hamburgerToggler = document.querySelector(".hamburger");
const navbarContainer = document.querySelector(".navbar");

const toggleNav = e => {
    hamburgerToggler.classList.toggle("open")
    
    const ariaToggle = hamburgerToggler.getAttribute ("aria-expanded") === "true" ? "false" : "true";
    hamburgerToggler.setAttribute("aria-expanded", ariaToggle);

    navbarContainer.classList.toggle("show");
    const mainContent = document.querySelector('.main-content');
      mainContent.classList.toggle('show');
};
hamburgerToggler.addEventListener("click", toggleNav);

new ResizeObserver(entries => {
    if(entries[0].contentRect.width <= 700){
        navbarContainer.style.transition = "transform 0.3s ease-out"
    } else {
        navbarContainer.style.transition = "none"
    }
}).observe(document.body)

