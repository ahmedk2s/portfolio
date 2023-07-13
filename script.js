const textAnim = document.querySelector('h1');
new Typewriter(textAnim, {
    deleteSpeed: 20
})
.changeDelay(20)
.typeString('Hi,<br> I\'am Ahmed')
.pauseFor(300)
.typeString('<span style="color: #E55E34"><br> Developpeur web </span>')
.start();


   