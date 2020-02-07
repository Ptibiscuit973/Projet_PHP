<?php
require_once('../connexion.php');
require_once('../partials/header.php') ?>


<?php



if($connect){
    $sql1 = "SELECT * FROM chambre";
    $res = mysqli_query($connect, $sql1);

    if(isset($_POST['soumis'])){

    $sql = "INSERT INTO chambre (prix,nbLits,nbPers,confort,image,description) VALUES (?,?,?,?,?,?)";
    // Préparation de la requête
        $resultat = mysqli_prepare($connect, $sql);
        // Liaison des paramètres.
        $ok = mysqli_stmt_bind_param($resultat, 'iiisss',$prix,$nbLits,$nbPers,$confort,$image,$description);



        $prix = (int)($_POST['prix']);
        $nbLits = (int)($_POST['nbLits']);
        $nbPers = (int)($_POST['nbPers']);
        $confort = trim(addslashes(htmlentities($_POST['confort'])));
        $description = trim(addslashes(htmlentities($_POST['description'])));
        $image = $_FILES['image']['name'];
    
        $destination = '../images/';
        move_uploaded_file($_FILES['image']['tmp_name'],
        $destination.$_FILES['image']['name']);
    
    
    

        // Exécution de la requête.
        $ok = mysqli_stmt_execute($resultat);
        if ($ok) {
         header('location:selectAjax.php');
        }
        else {
       echo "Echec de l’exécution de la requête.<br/>";
        }
        }

    }



?>
<div class="container">
<form method="post" enctype="multipart/form-data">
<div class="text-center"><h3><b>Ajout</b></h3></div>
  <div class="row">
  
  
    <div class="col">
    <label for="prix">Prix</label>
      <input type="number" class="form-control" id="prix" placeholder="Enter price" name="prix">
    </div>
    <div class="col">
    <label for="nbLits">Nombre de lits</label>
      <input type="number" class="form-control" placeholder="Entrez le nombre de lits" name="nbLits">
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="nbPers">Nombre de personnes</label>
      <input type="number" class="form-control" id="nbPers" placeholder="Entrez le nombre de personnes" name="nbPers">
    </div>
    <div class="col">
    <label for="confort">Confort : </label>
      <input type="text" class="form-control" placeholder="Entrez le type de confort" name="confort">
    </div>
  </div>
  <div class="row">
    <div class="col">
        <label for="image">Telechargez image : </label>
        <input type="file" class="form-control-file border" name="image"> 
    </div>
    <div class="col">
    <label for="description">Description : </label>
      <textarea class="form-control" placeholder="Entrez descriptif" name="description"></textarea>

      <br>
      <button type="submit"  name="soumis" class="btn btn-success">Ajouter</button>
    </div>
  </div>
</form>
</div>









<?php require_once('../partials/footer.php') ?>