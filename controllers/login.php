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
        $data = $check->fetch();
        $row = $check->rowCount();
        if ($row == 1) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (password_verify($pass, $data['pass'])) {
                    $_SESSION['user'] = $data['pseudo'];
                    redirection('../profile.php');
                    
                }else redirection('../login.php?login_erreur=password') ;
            }else redirection('../login.php?login_erreur=email');
        }else redirection('../login.php?login_erreur=compte');
    }else redirection('../login.php');
    
}