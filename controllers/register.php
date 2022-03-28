<?php
require_once "../_funcs/function.php";
require '../_funcs/db_connect.php';

$nom = al($_POST['nom']);
$pseudo = al($_POST['pseudo']);
$email = al($_POST['email']);
$pass = al($_POST['pass']);
$pass2 = al($_POST['pass2']);


if (isset($nom)  && isset($pseudo) && isset($email) && isset($pass) && isset($pass2)) {

  $chek = $db->prepare('SELECT * FROM users where  email = ? OR pseudo = ?');
  $chek->execute(array($email, $pseudo));
  $data = $chek->fetch();
  $row = $chek->rowCount();
  if($row == 0 ){
      if (strlen($nom) > 3 ) {
              if (strlen($pseudo) > 3 ) {
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
                            redirection('../register.php?erreur=succes');
                          }else
                            redirection('../register.php?erreur=mot_de_passe_different');  
                      }else
                       redirection('../register.php?erreur=taille_mot_de_passe'); 
                  }else
                    redirection('../register.php?erreur=email_non_valide');
              }else
                redirection('../register.php?erreur=taiile_pseudo');    
      }else
        redirection('../register.php?erreur=taille_nom_et_non_numeric ');
  }else
    redirection('../register.php?erreur=utilisateur_existe');
  }else
    redirection('../register.php?erreur=utilisateur_existe');
