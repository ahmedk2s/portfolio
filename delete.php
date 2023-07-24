<?php
session_start();
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM works WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
    
    $row = $result;
    $cheminImageASupprimer = $row['image'];

    if (unlink($cheminImageASupprimer)) 
        
if(!$result){
    header('Location: back_office.php');
}
    $sql = "DELETE FROM works WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();
    // require_once('close.php');
    header('Location: back_office.php');
}else{
    header('Location: back_office .php');
}
if ($query) {
    $_SESSION['confirmation'] ="Produit a été suprimé avec succès";
    
} else {
    $_SESSION['confirmation'] = "Erreur";
    
}