<?php
session_start();
require_once "_inc/header.php";
?>

<h3>Bonjour <?= ucfirst($_SESSION['user']); ?>
