<?php 
require_once('../connexion.php');
require_once('../partials/header.php');
?>

<?php

if($connect){

    if(isset($_POST['mcle'])){
        $mcle = trim(htmlspecialchars($_POST['mcle']));
        $sql = "SELECT * FROM reservation WHERE numChambre LIKE '$mcle%'";
        }else{
            $sql = "SELECT * FROM reservation";
        }
        $res = mysqli_query($connect,$sql);
    }





?>
<div class="container">
<h3 class="text-center">Liste des reservations</h3>

    <form action="" method="post">
    <div class="input-group  mb-1 justify-content-end ">
        <input type="search" class="form-control col-4 text-center" name="mcle" id="" placeholder="rechercher">
        <button type="submit">
            <i class="fa fa-search">Rechercher</i>
        </button>
    </div>
    </form>
    </div>



<table>
<thead>
<th>Id Client</th>
<th>Numéro de chambre</th>
<th>Date de d'arrivée</th>
<th>Date de départ</th>
<th>Modif</th>

</thead>

<tbody>
<?php 

if($res){
   
        while ($rows = mysqli_fetch_assoc($res)) {
           
        $sql = "SELECT * FROM reservation "; 
        
        



?>
<td><?= $rows['numClient'] ?></td>
<td><?= $rows['numChambre'] ?></td>
<td><?= $rows['dateArrivee'] ?></td>
<td><?= $rows['dateDepart'] ?></td>
<td><button type="submit">Modifier</button></td>
<td>

<?php if(isset($_SESSION['user'])){
    
    if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 1){?>
<a href="supprimer_reservation.php?numClient=<?= $rows['numClient']?>&numChambre=<?= $rows['numChambre']?>" class="btn btn-danger" >supprimer</a>
<?php }}?>  </td>
<?php 

}}


?>

</tbody>

</table>

</div>
<div>







<?php  require_once('../partials/footer.php'); ?>