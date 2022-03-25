<?php 
require_once "_inc/header.php";
require_once "_funcs/function.php";
$title = "inscription"; 

?>
  <?php 
    if(isset($_GET['erreur'])){
      $erreur  = al($_GET['erreur']);
      switch($erreur)
      {
        case  'succes':
          ?>
          
                <div class="alert alert-success">
                    <strong>Suces: </strong> vos informations sont envoyées avec succes
                  </div>
          <?php
          break; 
          case 'utilisateur_existe':
            ?>
              <div class="alert alert-warning">
                <strong>Erreur: </strong> ce compte existe deja
              </div>
            <?php
            break;
            case 'taille nom_et_non_numeric ':
              ?>
                <div class="alert alert-warning">
                  <strong>Erreur: </strong> Nom incorrect
                </div>
              <?php
              break;
              case 'taille_pseudo':
                ?>
                  <div class="alert alert-warning">
                    <strong>Erreur: </strong>Pseudo inccorect
                  </div>
                <?php
                break;
                case 'email_non_valide ':
                  ?>
                    <div class="alert alert-warning">
                      <strong>Erreur: </strong>Email non valide
                    </div>
                  <?php
                  break;
                  case 'taille_mot_de_passe ':
                    ?>
                      <div class="alert alert-warning">
                        <strong>Erreur</strong>Verifier la taille (plus de 7 caracteres)
                      </div>
                    <?php
                    break;
                    case 'mot_de_passe_different ':
                      ?>
                        <div class="alert alert-warning">
                          <strong>Erreur: </strong>Mot de passe different
                        </div>
                      <?php
                      break;
                      
      }
    }
  ?>
<div class="login-form">
    <form action="controllers/register.php" method="post">
        <h2 class="text-center">Inscription</h2>
            <div class="form-group">
                <input type="text" name="nom" class="form-control " placeholder="nom" autocomplete="on">
            </div>
            <div class="form-group">
                <input type="text" name="pseudo" class="form-control" placeholder="pseudo" autocomplete="on">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control " placeholder="email" autocomplete="on">
            </div>
            <div class="form-group">
                  <input type="password" name="pass" class="form-control" placeholder="password" autocomplete="on">
            </div>
               <div class="form-group">
                  <input type="password" name="pass2" class="form-control" placeholder="password" autocomplete="on">
          
              </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary mb-3" name="register">Envoyer</button>
          </div>
      </form>
</div>

  
  
<?php "_inc/header.php"; ?>