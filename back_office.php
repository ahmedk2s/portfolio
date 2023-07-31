<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
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

    <h1 class="merriweather text-center mb-4 py-5">GESTION DES PROJETS</h1>
 





    <!-- ---------------------------------- ADD MODAL ------------------------------------------>

    <?php
    if ($_POST) {

        if (
            isset($_POST['nom'])
            && isset($_POST['description'])
            && (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0)
            
        )
            $allowed = [
                "jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "png" => "image/png",
                "webp" => "image/webp"
            ];

        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)) {
            die("Erreur: format de fichier incorrect");
        }

        if ($filesize > 2024 * 2024) {
            die("Fichier trop volumineux");
        }

        $newname = md5(uniqid());
        $newfilename = "./images/$newname.$extension";

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)) {
            die("L'upload a échoué");
        } else {
            $picture = $newfilename; // Mettez à jour la variable $picture avec le nouveau nom de fichier
        }

        chmod($newfilename, 0644); {
            require_once('connect.php');
            $name = strip_tags($_POST['nom']);
            $description = strip_tags($_POST['description']);
            $picture = $newfilename;
            

            $sql = "INSERT INTO works (nom, description, image) VALUES (:nom, :description, :image)";
            $query = $db->prepare($sql);
            $query->bindValue(":nom", $name, PDO::PARAM_STR);
            $query->bindValue(":description", $description);
            $query->bindValue(":image", $picture);
            
            $query->execute();
        }
        if ($query) {
            $_SESSION['confirmation'] = "Produit a été ajouté avec succès";
  3          
        } else {
            $_SESSION['confirmation'] = "Erreur";
            
        }
    }
    include('confirmation.php'); 
    ?>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un projet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 mx-auto">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label"></label>
                                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label"></label>
                                            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label"></label>
                                            <input class="form-control" name="image" type="file" id="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="back_office.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button></a>
                        <button type="submit" class="btn btn-primary" value="Ajouter">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
        <div class="d-md-flex justify-content-md-end mx-3 px-3">
            <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#addModal">
                AJOUTER
            </button>
            <a href="index.php"><button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#addModal">
                RETOUR 
            </button></a>
            <a href="deconnexion.php" class="btn btn-primary">Déconnexion</a>
        </div>
        
    

    <!-- ------------------------------------------------------ TABLE ------------------------------------------------------- -->

    <?php
    require_once('connect.php');

    $sql = "SELECT * FROM works";
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    ?>

    <section class="table-boot py-5">
        <div class=".container-fluid">
            <table class="table table-bordered border-dark hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($result as $works) {

                    ?>
                        <tr>
                            <td><?= $works['id'] ?></td>
                            <td><?= $works['nom'] ?></td>
                            <td><?= $works['description'] ?></td>
                            <td style="width: 30rem;"><img class="img img-fluid" style="width: 30rem;" src="<?= $works['image'] ?>" alt=""></td>
                            
                            <td>
                            <a href="update.php?id=<?= $works['id'] ?>"><button type="button" class="btn btn-primary">EDIT</button></a>
                            <button type="button" class="btn btn-danger sup" data-bs-toggle="modal" data-bs-target="#confirmationModal" data-id="<?= $works['id'] ?>">DELETE</button>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                    <tr></tr>
                     <!-- Modale de confirmation -->
                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer cet élément ?</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger delete">Supprimer</button>
                        </div>
                    </div>
                    </div>
                </div>
                </tbody>
            </table>
        </div>
    </section>
    <?php

    ?>
<script>
    const  modalDeleteTriggers = document.querySelectorAll(".sup");
let id = null

modalDeleteTriggers.forEach((Trigger) =>
  Trigger.addEventListener("click", () => {
    id = Trigger.getAttribute("data-id");
  })
);

const btn = document.querySelector(".delete")  
 btn.addEventListener("click", ()=> {     
    window.location.replace("delete.php?id=" + id)});

</script>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>