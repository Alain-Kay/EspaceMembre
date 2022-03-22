<?php

    try{
      $db = new PDO('mysql:host=localhost;dbname=auth', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
  
  }catch(PDOException $e){
      die('Impossible de se connecter à la base de donnée du à l\'erreur: '.$e->getMessage());
    }

