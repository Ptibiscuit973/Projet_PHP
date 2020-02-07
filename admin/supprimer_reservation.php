<?php 
require_once('../connexion.php');
require_once('../partials/header.php') ?>

<?php

if(isset($_GET['numChambre'])){
    $numClient = (int)htmlentities(trim($_GET['numClient']));
    $numChambre = (int)htmlentities(trim($_GET['numChambre']));
    echo 'ok';
    if($connect){
        $sql = "DELETE FROM reservation WHERE numChambre = '$numChambre' && numClient = '$numClient'";
        // Préparation de la requête
        $resultat = mysqli_prepare($connect,$sql);
        // Liaison des paramètres.
   
        // $ok = mysqli_stmt_bind_param($resultat,'s',$dateArrivee);
  
        $ok = mysqli_stmt_execute($resultat);

        if ($ok) {
            header('location:reservation.php');

            }
            else {
            echo "Echec de l’exécution de la requête.<br />";
            }

    }
}



?>

<?php require_once('../partials/footer.php') ?>