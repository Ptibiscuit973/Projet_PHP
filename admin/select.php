<?php
require_once('../config.php');

require_once('../connexion.php');
if($connect){
    if(isset($_POST['mcle'])){
    $mcle = trim(htmlspecialchars($_POST['mcle']));
    $sql = "SELECT * FROM chambre WHERE confort LIKE '$mcle%'";
    }else{
        $sql = "SELECT * FROM chambre";
    }
    $res = mysqli_query($connect,$sql);
}
?>

<?php require_once('../partials/header.php')?>

<div class="container">
<h3 class="text-center">Liste des chambres</h3>
    <p class="text-right">
    
    </p>
    <form action="" method="post">
    <div class="input-group  mb-1 justify-content-end ">
        <input type="search" class="form-control col-4 text-center" name="mcle" id="" placeholder="rechercher">
        <button type="submit">
            <i class="fa fa-search">rechercher</i>
        </button>
    </div>
    </form>
<div class=" card-deck">
        <?php
        if($res){
            while($rows = mysqli_fetch_assoc($res)){
                
                $sql = "SELECT * FROM chambre WHERE id = ".$rows['numChambre'];
                $result = mysqli_query($connect,$sql);
            
               // $ligne = mysqli_fetch_assoc($result);
                //var_dump($ligne);
        ?>


<div class="card">
  <img class="card-img-top" src="../images/<?=$rows['image']; ?>" alt="Card image">
  <div class="card-body text-center">
    <h4 class="card-title">Chambre : <?=$rows['numChambre']; ?></h4>
    <p><?=$rows['nbLits']; ?> lit(s)</p>
    <p>Pour <?=$rows['nbPers']; ?> personnes</p>
    <p>Confort : <?=$rows['confort']; ?></p>
    <p class="card-text"><?=$rows['description']; ?></p>
    <p><b> Prix : <?=$rows['prix']; ?> € / nuit</b></p>
    <a href="details.php?id=<?= $rows['numChambre']; ?>" class="btn btn-primary" >Details</a>


  </div>
  </div>


    <?php }} ?>
</div>
</div>
<?php require_once('../partials/footer.php'); ?>