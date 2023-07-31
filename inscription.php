<?php
session_start();

// Initialize the $_SESSION["error"] array if it's not already set
if (!isset($_SESSION["error"])) {
    $_SESSION["error"] = [];
}

if (!empty($_POST)) {
    if (isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"][] = "L'adresse email est incorrecte";
        }

        if ($_SESSION["error"] === []) {
            $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

            require_once("connect.php");

            $sql = "INSERT INTO user (email, pass) VALUES (:email, '$pass')";

            $query = $db->prepare($sql);

            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $query->execute();

            $id = $db->lastInsertId();

            $_SESSION["user"] = [
                "id" => $id,
                "email" => $_POST["email"],
            ];

            header("Location: index.php");
        }
    } else {
        $_SESSION["error"] = ["Le formulaire est incomplet"];
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inscription</title>
</head>

<body>
    <section class="inscri">

        <h1>Inscription</h1>
        <?php 
            if(isset($_SESSION["error"])){
                foreach($_SESSION["error"] as $message){
                    ?>
                    <p><?= $message ?></p>
                    <?php
                }
                unset($_SESSION["error"]);
            }
        ?>

        <form method="POST" action="">

            <label for="email"></label>
            <input type="text" id="email" name="email" placeholder="E-mail" required>

            <label for="pass"></label>
            <input type="password" id="pass" name="pass" placeholder="Mot de passe">

            <input type="submit" class="send" value="Valider" name="ok">

        </form>
    </section>
</body>

</html>