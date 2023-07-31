<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Mettez ici votre adresse e-mail où vous souhaitez recevoir les messages du formulaire
    $destination_email = "ahmed_k@laposte.net";

    $sujet = "Nouveau message du formulaire de contact";
    $contenu .= "Nom: $nom\n";
    $contenu .= "Email: $email\n";
    $contenu .= "Message:\n$message\n";

    // En-têtes pour l'envoi de l'e-mail
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Envoi de l'e-mail
    mail($destination_email, $sujet, $contenu, $headers);

    // Redirection vers la page de confirmation
    header("Location: index.php");
    exit();
}
?>


