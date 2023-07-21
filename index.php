<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Portfolio</title>
</head>

<body>

    <nav>
        <ul class="navbar">
            <li class="active"><a href="">Accueil</a></li>
            <li><a href="#">Profil</a></li>
            <li><a href="#">Compétences</a></li>
            <li><a href="#">Projets</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <section class="accueil">
        <div class="accueil-left-Container">
            <h1></h1>
        </div>
        <div class="accueil-right-container">
            <img src="./imgs/ordinateur.jpg" alt="ordinateur">
        </div>
    </section>

    <section class="profil">
        <div class="profil-container">
            <div class="profil-left-container">
                <img id="question" src="./imgs/question.jpg" alt="point d'interrogation">
            </div>
            <div class="profil-right-container">
                <h2>Qui suis-je ?</h2>
                <p>Hello, Je suis Ahmed, Développeur Web, motivé par les nouvelles technologies et leurs facultés à améliorer la productivité des entreprises.</p>
            </div>
        </div>
    </section>

    <section class="competences">
        <div class="competences-container">
            <div class="competences-left-container">
                <h2>Mes compétences</h2>
                <div class="block-competences">
                    <p>
                        HTML :
                        Création de pages web structurées en utilisant les balises HTML.
                        Intégration de contenus multimédias tels que images, vidéos et audio.
                    </p>
                    <p>
                        CSS :
                        Mise en forme et stylisation des pages web en utilisant les propriétés CSS.
                        Création de mises en page responsives pour assurer une expérience utilisateur optimale sur différents appareils.</p>
                    <p>
                        PHP :
                        Développement de fonctionnalités dynamiques en utilisant PHP pour interagir avec les bases de données et les formulaires.
                        Gestion de sessions et de cookies pour maintenir l'état de l'utilisateur sur le site web.
                        Création de requêtes SQL sécurisées pour éviter les attaques par injection.</p>
                    <p>
                        JavaScript :
                        Ajout d'interactivité et de comportements dynamiques aux pages web en utilisant JavaScript.
                        Manipulation du DOM (Document Object Model) pour modifier le contenu et l'apparence des pages sans rechargement.</p>
                </div>
            </div>
            <div class="competences-right-container">
                <img src="./imgs/competences.jpg" alt="cravate">
            </div>
        </div>
    </section>

    <section class="projets">
        <div class="projets-container">
                <h2>Mes projets</h2>
                <div class="cards-container">
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-front" id="jadoo">
                                <i class="arrow-icon fas fa-arrow-right"></i>
                            </div>
                            <div class="card-back">
                                <a href="" class="btn">Voir le site</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-front" id="agence-de-voyage">
                                <img src="" alt="">
                                <i class="arrow-icon fas fa-arrow-right"></i>
                            </div>
                            <div class="card-back">
                                <a href="" class="btn">Voir le site</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-front" id="catalogue">
                                <img src="" alt="">
                                <i class="arrow-icon fas fa-arrow-right"></i>
                            </div>
                            <div class="card-back">
                                <a href="" class="btn">Voir le site</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <section class="contact">
        <div class="contact-container">
            <div class="contact-container">

                <div class="contact-left-container">
                    <form action="">
                        <h3>Contactez-moi</h3>
                        <div class="separation"></div>
                        <div class="main-form">
                            <div class="part-left">
                                <div class="box">
                                    <label for="">Votre prénom</label>
                                    <input type="text">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="box">
                                    <label for="">Votre adresse e-mail</label>
                                    <input type="text">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                            </div>
                            <div class="part-right">
                                <div class="box">
                                    <label for="">Message</label>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="footer-form">
                            <button>Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>





    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="script.js"></script>
</body>

</html>