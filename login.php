<?php

// Démarrer la session
session_start();

// Vérifier si le formulaire a été soumis
if (!empty($_POST)) {

  // Vérifier si les champs "login" et "password" sont renseignés
  if (isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {

    // Connecter à la base de données
    require_once("connect.php");

    // Exécuter la requête SQL
    $sql = "SELECT * FROM user WHERE email = :email AND pass = :pass";
    $query = $db->prepare($sql);
    $query->bindValue(":email", $_POST["email"]);
    $query->bindValue(":pass", $_POST["pass"]);
    $query->execute();

    // Récupérer l'utilisateur
    $user = $query->fetch();

    // Vérifier si l'utilisateur existe
    if ($user) {

      // Créer une session
      $_SESSION["user"] = $user;

      // Rediriger vers la page de l'espace membre
      header("Location: back_office.php");
      exit();
    } else {

      // Afficher un message d'erreur
    //   echo "L'utilisateur et/ou le mot de passe est incorrect";
    echo "<script>alert('Pas bon')</script";
    }
  } else {

    // Afficher un message d'erreur
    echo "Veuillez remplir tous les champs";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>
<body class="body-login">
    <div class="login-box">
        <form method="POST" action="">
            <h2>Login</h2>
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" id="pass" name="pass" required>
                <label for="pass">Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="send">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
