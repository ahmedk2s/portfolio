<?php
    require_once(__DIR__.'/vendor/autoload.php');
    use \Mailjet\Ressources;

    define('API_USER', '');
    define('API_LOGIN', '');
    

    if (!empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $surname = htmlspecialchars($_POST['surname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        }else{
            echo "Email non valide";
        }

    }else{
        header('Location:index.php');
        die();
    }