<?php 
require_once('../connexion.php');
require_once('../partials/header.php') ?>

<?php

if(isset($_GET['id'])){
    $numChambre = (int)htmlentities(trim($_GET['id']));
    if($connect){
        $sql = "DELETE FROM chambre WHERE numChambre = ?";
        // Préparation de la requête
        $resultat = mysqli_prepare($connect,$sql);
        // Liaison des paramètres.
   
        $ok = mysqli_stmt_bind_param($resultat,'i',$numChambre);
        $image = mysqli_stmt_fetch($resultat);
        $ok = mysqli_stmt_execute($resultat);

        if ($ok) {
            echo "Chambre supprimée.<br />";
            unlink('../images/'.$image);
            }
            else {
            echo "Echec de l’exécution de la requête.<br />";
            }

    }
}



?>

<?php require_once('../partials/footer.php') ?>