<?php
require_once('connect.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM works WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $works = $query->fetch();
} else {
    header('location: back_office.php');
    exit(); // Terminer le script après la redirection
}
if ($_POST) {
    if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description'])) {

        $id = strip_tags($_POST['id']);
        $nom = strip_tags($_POST['nom']);
        $description = strip_tags($_POST['description']);


        // Vérifier si une nouvelle image a été téléchargée
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $allowed = [
                "jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "png" => "image/png",
                "webp" => "image/webp"
            ];

            $filename = $_FILES['image']['name'];
            $filetype = $_FILES['image']['type'];
            $filesize = $_FILES['image']['size'];

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)) {
                die("Erreur: format de fichier incorrect");
            }

            if ($filesize > 2024 * 2024) {
                die("Fichier trop volumineux");
            }

            $newname = md5(uniqid());
            $newfilename = "./images/$newname.$extension";

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $newfilename)) {
                die("L'upload a échoué : " . $_FILES['image']['error']);
            } else {
                // Supprimer l'ancienne image s'il y en avait une
                if (isset($_FILES['image'])) {
                    $delete = $works['image'];
                    unlink($delete);
                }

                $picture = $newfilename; // Mettez à jour la variable $picture avec le nouveau nom de fichier
            }
        } else {
            // Aucune nouvelle image n'a été téléchargée, utilisez l'image existante
            $picture = strip_tags($_POST['current_image']);
        }

        $sql = "UPDATE works SET nom = :nom, description = :description, image = :image WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':nom', $nom);
        $query->bindValue(':description', $description);
        $query->bindValue(':image', $picture);
        $query->execute();

        header('location: back_office.php');
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>

<body>


    <form method="post" enctype="multipart/form-data">

        <div class="form py-5">

            <div class="row">
                <div class="col-md-8 mx-auto shadow-lg p-3 .container-md border border-black py-5 px-5 rounded-4" style="max-width: 40rem; margin-top: 100px;">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" value="<?= $works['nom'] ?>" name="nom" id="nom" placeholder="Nom">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" value="<?= $works['description'] ?>" name="description" id="description" placeholder="Description">
                    </div>
                    <div class="mb-3">

                        <label for="image" class="form-label"></label>
                        <input class="form-control" name="image" type="file" value="<?= $works['image'] ?>" id=" image">
                        <input type="hidden" name="current_image" value="<?= $works['image'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" value="<?= $works['id'] ?>" name="id">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="back_office.php"><button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Annuler</button></a>
                            <button type="submit" class="btn btn-primary" style="max-width: 5.2rem;" value="Modifier">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>



    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>