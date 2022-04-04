<?php
session_start();
if(!isset($_SESSION['user'])){
    redirection('../login.php');
}
require_once "_inc/header.php";

?>

<div class="container">
    <div class="row">
        <div class="col mt-4">
            <h3 class="text-primary">Bonjour <?= ucfirst($_SESSION['user']); ?>
        </div> 
        <div class="col mt-4 ">
            <a href ="deconnexion.php" class="btn btn-danger btn-lg">Deconnexion </a>
        </div>
    </div>
</div>
