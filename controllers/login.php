<?php
$base = '../';

require_once $base . 'db.php';


function handleLogin($user, $pwd) {
    if(!isset($user) || !isset($pwd)){
        header('Location: ../views/login.php');
        exit();
    }

    $GLOBALS['conn'];

}

handleLogin($_POST['usuari'], POST['contrasenya']);