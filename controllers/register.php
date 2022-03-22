<?php
require_once "../_funcs/function.php";
require '../_funcs/db_connect.php';

$nom = al($_POST['nom']);
$pseudo = al($_POST['pseudo']);
$email = al($_POST['email']);
$pass = al($_POST['pass']);
$pass2 = al($_POST['pass2']);

if (isset($nom)  && isset($pseudo) && isset($email) && isset($pass) && isset($pass2)) {

  $chek = $db->prepare('SELECT nom, pseudo, email, pass, pass2 FROM users where  email = ?');
  $chek->execute(array($email));
  $data = $chek->fetch();
  $row = $chek->rowCount();
  if($row == 0 ){
      if (strlen($nom) <100 ) {
              if (strlen($pseudo) <100 ) {
                  if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      if (strlen($pass) >= 5 || strlen($pass2) >= 5 ) {
                          if ($pass == $pass2) {
                            $hash = password_hash($pass,   PASSWORD_BCRYPT);
                            $insert = $db->prepare('INSERT INTO users (nom,  pseudo, email, pass, pass2) 
                                                    VALUES(:nom, :pseudo, :email,  :pass, :pass2)');
                            $insert->execute(array( 
                                        'nom' => $nom,
                                        'pseudo' => $pseudo,
                                        'email' => $email,
                                        'pass' => $hash,
                                        'pass2' => $pass2                
                                        )); 
                            redirection('../inscription.php?erreur=succes');
                          }else
                            redirection('../inscription.php?erreur=mot_de_passe_different');  
                      }else
                       redirection('../inscription.php?erreur=taille_mot_de_passe'); 
                  }else
                    redirection('../inscription.php?erreur=email_non_valide');
              }else
                redirection('../inscription.php?erreur=taiile_pseudo_et_non_numeri');    
      }else
        redirection('../inscription.php?erreur=taille_nom_et_non_numeric ');
  }else
    redirection('../inscription.php?erreur=utilisateur_existe');
  }else
    redirection('../inscription.php?erreur=utilisateur_existe');
