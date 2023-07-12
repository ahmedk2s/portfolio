const textAnim = document.querySelector('h1');

new Typewriter(textAnim, {
    deleteSpeed: 20
})
.changeDelay(20)
.typeString('Hello,<br> I\'am Ahmed')
.pauseFor(300)
.typeString('<span style="color: #E55E34" font-size="4rem"><br> Developpeur web </span>')
.start();

var typed = new Typed('#element', {
    strings: ['<span class="custom-text">Développeur web !</span>'],
    typeSpeed: 50
  });

   