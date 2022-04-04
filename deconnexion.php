<?php
session_start();
session_destroy();
require_once "_funcs/function.php";
redirection('login.php');