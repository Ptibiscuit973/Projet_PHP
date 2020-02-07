<?php
require_once('../partials/header.php');
require_once('../connexion.php');
?>
<div class="container">
<h3 class="text-center">Details de chambre</h3>
<div class=" card-deck">
        <?php

        if(isset($_GET['id'])){
        $numChambre = (int)htmlentities(trim($_GET['id']));
            if($connect){
            $sql = "SELECT * FROM chambre WHERE numChambre =?";
            $resultat = mysqli_prepare($connect,$sql);
            $ok = mysqli_stmt_bind_param($resultat,'i',$numChambre); 
            $ok = mysqli_stmt_execute($resultat);
           
            if($ok == FALSE){
                echo "Echec de l’exécution de la requête.<br />";
            }else{
                $ok = mysqli_stmt_bind_result($resultat,$numChambre,$prix,$nbLits,$nbPers,$confort,$image,$description);
                
                while(mysqli_stmt_fetch($resultat)){
                    

                }
            }
            mysqli_stmt_close($resultat);


        ?>


<div class="card">
  <img class="card-img-top" src="../images/<?= $image ?>" alt="Card image">
  <div class="card-body text-center">
    <h4 class="card-title">Chambre : <?= $numChambre ?></h4>
    <p><?=$nbLits; ?> lit(s)</p>
    <p>Pour <?=$nbPers; ?> personnes</p>
    <p>Confort : <?=$confort; ?></p>
    <p class="card-text"><?=$description; ?></p>
    <p><b> Prix : <?=$prix; ?> € / nuit</b></p>
    <a href="reservation.php?id=<?= $numChambre; ?>" id="numChambre" class="btn btn-warning" >Reserver</a>
    <a href="select.php" class="btn btn-danger" >Retour</a>
    
  </div>
  </div>

<?php

        }
    }

?>
</div>
</div>


<?php
require_once('../partials/footer.php');
?>