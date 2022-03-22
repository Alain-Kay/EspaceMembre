<?php $title = "inscription"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <title><?php $title; ?></title>
</head>
<body>
  <?php 
    if(isset($_GET['erreur'])){
      $erreur  = htmlspecialchars($_GET['erreur']);
      switch($erreur)
      {
        case  'succes':
          ?>
          
                <div class="alert alert-success">
                    <strong>Suces: </strong> vos informations sont envoyées avec succes
                  </div>
          <?php
          break; 

        case 'champ_vide':
          ?>
            <div class="alert alert-warning">
              <strong>Erreur: </strong> vos champs sont vides
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
              case 'taille_prenom_et_non_numeric':
                ?>
                  <div class="alert alert-warning">
                    <strong>Erreur: </strong> Prenom incorrect
                  </div>
                <?php
                break;
              case 'taille_pseudo_et_non_numeric ':
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
      <input type="password" name="pass2" class="form-control" placeholder="password" autocomplete="on">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary mb-3" name="register">Envoyer</button>
    </div>
    
</div>

  </form>
  
</body>
</html>