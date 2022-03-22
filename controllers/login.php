<?php
require_once "../_funcs/function.php";
require '../_funcs/db_connect.php';

$email = al($_POST['email']);
$pass = al($_POST['pass']);

if (isset($email) && isset($pass) && $pass2) {
    $check = $db->prepare('SELECT email, pass,  pass2 FROM users where  email = ?');
    $check->exec(array($email));
    $data = $chek->fetch();
    $row = $chek->rowCount();
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hash = password_hash($pass,   PASSWORD_BCRYPT);
            if ($data['pass'] == $hash) {
                $_SESSION['user'] = $data['pseudo'];
                redirection('../profil.php');
                
            }else redirection('../connexion.php?login_erreur=password')  
        }else redirection('../connexion.php?login_erreur=email')
    }else redirection('../connexion.php?login_erreur=existe_pas')
}redirection('../connexion.php')