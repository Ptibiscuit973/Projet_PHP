<?php 
require_once('../connexion.php');
require_once('../partials/header.php') ?>




<?php 

if($connect){
    if(isset($_GET['id']) && isset($_POST['valider'])){

        $numChambre = $_GET['id'];
        $sql = "UPDATE chambre SET prix = ?, nbLits = ?, nbPers = ?, confort = ?,description = ?, image = ? WHERE numChambre ='$numChambre'";
       // var_dump($_POST);

    // Préparation de la requête
    $resultat = mysqli_prepare($connect, $sql);
    // Liaison des paramètres.
    $ok = mysqli_stmt_bind_param($resultat,'iiisss',$prix,$nbLits,$nbPers,$confort,$description,$image);




        $prix = (int)($_POST['prix']);
        $nbLits = (int)($_POST['nbLits']);
        $nbPers = (int)($_POST['nbPers']);
        $confort = trim(addslashes(htmlentities($_POST['confort'])));  
        $image = $_FILES['image']['name'];
        $description = trim(addslashes(htmlentities($_POST['description'])));
      
   
        $destination = '../images/';
        move_uploaded_file($_FILES['image']['tmp_name'],
        $destination.$_FILES['image']['name']);



        // Exécution de la requête.
        $ok = mysqli_stmt_execute($resultat);


        if ($ok) {
        echo 'good';
        }    
    }

}




?>



<?php

if($connect){
    if(isset($_GET['id'])){
        $numChambre = $_GET['id'];
            
            $sql = "SELECT prix,nbLits,nbPers,confort,description,image FROM chambre WHERE numChambre =?";
            $resultat = mysqli_prepare($connect,$sql);
            $ok = mysqli_stmt_bind_param($resultat,'i',$numChambre); 
            $ok = mysqli_stmt_execute($resultat);
        if($ok){
            $ok = mysqli_stmt_bind_result($resultat,$prix,$nbLits,$nbPers,$confort,$description,$image);
            while(mysqli_stmt_fetch($resultat)){
                   



?>



<div class="container">
<form method="post" enctype="multipart/form-data">
<div class="text-center"><h3><b>Edition</b></h3></div>
  <div class="row">
  
  
    <div class="col">
    <label for="prix">Prix</label>
      <input type="number" class="form-control" id="prix" placeholder="<?= $prix ?>" name="prix">
    </div>
    <div class="col">
    <label for="nbLits">Nombre de lits</label>
      <input type="number" class="form-control" placeholder="<?= $nbLits ?>" name="nbLits">
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="nbPers">Nombre de personnes</label>
      <input type="number" class="form-control" id="nbPers" placeholder="<?= $nbPers ?>" name="nbPers">
    </div>
    <div class="col">
    <label for="confort">Confort : </label>
      <input type="text" class="form-control" placeholder="<?= $confort ?>" name="confort">
    </div>
  </div>
  <div class="row">
    <div class="col">
        <label for="image">Telechargez image : </label>
        <img src="../images/<?= $image ?>" alt="image" width="200" height="200" class="img-fluid img-thumbnail">
        <input type="file" class="form-control-file border" name="image">
    </div>
    <div class="col">
    <label for="description">Description : </label>
      <textarea class="form-control" placeholder="<?= $description ?>" name="description"></textarea>

      <br>
      <button type="submit"  name="valider" class="btn btn-success">Valider</button>
    </div>
  </div>
</form>
<?php
}}}}
?>
</div>






<?php require_once('../partials/footer.php') ?>