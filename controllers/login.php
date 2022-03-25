<?php
session_start();
require_once "../_funcs/function.php";
require '../_funcs/db_connect.php';

$email = al($_POST['email']);
$pass = al($_POST['pass']);

if(isset($_POST['login'])){ 
    if (isset($email) && isset($pass)) {
        $check = $db->prepare('SELECT * FROM users where  email = ?');
        $check->execute(array($email));
        $data = $check->fetchAll();
        $row = $check->rowCount();
        if ($row == 1) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // $hash = password_hash($pass,   PASSWORD_BCRYPT);
                if ($data['pass2'] === $pass) {
                    $_SESSION['user'] = $data['pseudo'];
                    redirection('../profil.php');
                    
                }else redirection('../connexion.php?login_erreur=password') ;
            }else redirection('../connexion.php?login_erreur=email');
        }else redirection('../connexion.php?login_erreur=compte');
    }else redirection('../connexion.php');
    
}