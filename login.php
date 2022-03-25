<?php
require_once "_inc/header.php";
require_once "_funcs/function.php";

if (isset($_GET['login_erreur'])) {
    $erreur = al($_GET['login_erreur']);
    
    switch ($erreur) {
        case 'password':
            ?>
          
            <div class="alert alert-danger">
                <strong>Mot de passe incorrect </strong>  
            </div>
            <?php
            break;
        
        case 'email':
            ?>
          
            <div class="alert alert-danger">
                <strong>Email invalide </strong> 
            </div>
            <?php
            break;

            case 'compte':
            ?>
          
            <div class="alert alert-danger">
                <strong>Vous n'avez pas de compte</strong> 
            </div>
            <?php
            break;
    }
}
?>
<div class="container">
    
        <div class="login-form">
            <form action="controllers/login.php" method="post">
                <h2 class="text-center">connexion</h2>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="email" autocomplete="on">
                    </div>
                    <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="password" autocomplete="on">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="login">Envoyer</button>
                </div>
            </form>
        </div>

</div>
<?php require_once "_inc/footer.php"; ?>