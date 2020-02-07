<?php
$erreur = "";
if(isset($_POST['soumis']) ){
 if(!empty($_POST['login']) && !empty($_POST['pwd'])){
    $login = trim(addslashes(htmlspecialchars($_POST['login'])));
    $pass = md5(trim(addslashes(htmlspecialchars($_POST['pwd']))));
    require_once('../connexion.php');
    if($connect){
        $sql = "SELECT * FROM   utilisateurs 
        WHERE login = '$login' AND pass = '$pass'";
        $res = mysqli_query($connect, $sql);
        if($res){
            if(mysqli_num_rows($res) != 0){
                $data = mysqli_fetch_assoc($res);
                session_start();
                /*$_SESSION['user']['login'] = $login;
                $_SESSION['user']['pass'] = $pass;
                $_SESSION['user']['role'] = 2;
                */
                $_SESSION['user'] = $data;
                
                header('location:selectAjax.php');
            }else{
                $erreur = '<div class="alert alert-danger">
                            <strong>Le login et le mot de passe ne correspondent pas!</strong> 
                        </div>';
            }
        }
    }
 }else{
    $erreur = '<div class="alert alert-danger">
                <strong>Le login ou le mot de passe est vide!</strong> 
              </div>';
    }
}
?>
<?php require_once('../partials/header.php'); ?>
<div class=" offset-3 col-6">
<div class="card">
  <div class="card-header text-center">Page d'authentification</div>
  <div class="card-body">
    <form action="" method="post">
    <div class="form-group">
        <label for="login">login</label>
        <input type="text" class="form-control" placeholder="Entrer votre login" id="login" name="login">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe:</label>
        <input type="password" class="form-control" placeholder="Entrer votre mot de passe" id="pwd" name="pwd">
    </div>
    
    <button type="submit" class="btn btn btn-secondary btn-block" name="soumis">Soumettre</button>
    </form>
    </div>
    </div>
<?php echo $erreur; ?>
</div>
<?php require_once('../partials/footer.php'); ?>