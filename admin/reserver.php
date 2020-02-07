
<?php
/*

if(isset($_GET['id'])){
    $numChambre = (int)htmlentities(trim($_GET['id']));
        if($connect){
        $sql = "SELECT * FROM reservation WHERE numChambre =?";
        $resultat = mysqli_prepare($connect,$sql);
        $ok = mysqli_stmt_bind_param($resultat,'i',$numChambre); 


        $numClient = 
        // Exécution de la requête.
        $ok = mysqli_stmt_execute($resultat);


        if ($ok) {
            $ok = mysqli_stmt_bind_result($resultat,$numClient,$numChambre,$dateArrivee,$dateDepart);
            while(mysqli_stmt_fetch($resultat)){
            }
        }else{
            echo 'erreur';
        }
    mysqli_stmt_close($resultat)








?>








<div class="container">
<div><h4 class="text-center">Liste des reservations pour la chambre <?= $numChambre?></h4><br></div>
<form>
  <div class="form-row">
    <div class="col">
    <label for="numclient">Numéro de client</label>
      <input type="number" class="form-control" id="numclient" placeholder="<?= $numClient ?>" name="numclient" disabled>
    </div>
    <div class="col">
    <label for="numChambre">Numéro de chambre</label>
      <input type="number" class="form-control" id="numchambre" placeholder="<?= $numChambre ?>" name="numchambre" disabled>
    </div>
  </div>
  <div class="form-row">
    <div class="col">
    <label for="datearrivee">Date d'arrivée</label>
      <input type="date" class="form-control" id="datearrivee" placeholder="<?= $dateArrivee ?>" name="datearrivee">
    </div>
    <div class="col">
    <label for="datedepart">Date de départ</label>
      <input type="date" class="form-control" id="datedepart" placeholder="<?= $dateDepart ?>" name="datedepart">
    </div>
  </div>
  <div class="text-right">
  <button type="submit" name="reserver">Reserver</button>

  </div>
</form>
<?php   }} ?>
</div>

*/
