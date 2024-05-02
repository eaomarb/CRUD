<?php
session_start();

// Destruir totes les variables de sessió
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalment, destruir la sessió
session_destroy();

// Redirigir l'usuari a la pàgina d'inici de sessió
header("Location: login.php");
exit;
?>
