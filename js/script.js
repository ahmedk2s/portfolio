

const textElement = document.getElementById('typewriter-text');
const textToAnimate = "Hi, I'm Ahmed\nDéveloppeur web";
const typingDelay = 100; // Délai entre chaque caractère (en millisecondes)

let charIndex = 0;

function typeWriter() {
  const currentText = textToAnimate.slice(0, charIndex);
  textElement.innerHTML = currentText.replace(/\n/g, "<br>");

  if (charIndex < textToAnimate.length) {
    charIndex++;
    setTimeout(typeWriter, typingDelay);
  }
}

typeWriter();




window.addEventListener("scroll", () => {
    let scrollValue = (window.scrollY + window.innerHeight) / document.body.offsetHeight;
    const profil = document.querySelector(".profil-right-container");
    const img = document.getElementById("question");
  
    if (scrollValue > 0.30) {
      profil.style.opacity = 1;
      profil.style.transform = "none";
    }
  
    if (scrollValue > 0.50) {
      img.classList.remove("blink-animation");
    } else {
      
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




document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    const contentWrapper = document.querySelector(".content-wrapper");
    const headerHeight = navbar.offsetHeight;
  
    function updateNavbar() {
      if (window.pageYOffset >= headerHeight) {
        navbar.classList.add("sticky");
        contentWrapper.style.paddingTop = `${headerHeight}px`;
      } else {
        navbar.classList.remove("sticky");
        contentWrapper.style.paddingTop = "0";
      }
    }
  
    updateNavbar(); 
  
    window.addEventListener("scroll", updateNavbar);
  });
  