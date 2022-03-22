<?php
require_once "_inc/header.php";
?>
<div class="login-form">
    <form action="controllers/login.php" method="post">
        <h2 class="text-center">connexion</h2>
            <div class="form-group">
                <input type="email" name="email" class="form-control " placeholder="email" autocomplete="on">
            </div>
            <div class="form-group">
               <input type="password" name="pass" class="form-control" placeholder="password" autocomplete="on">
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary mb-3" name="register">Envoyer</button>
          </div>
    </form>
</div>
<?php require_once "_inc/footer.php"; ?>