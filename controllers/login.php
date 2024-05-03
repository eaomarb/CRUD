<?php
session_start();

$base = '../';
require_once $base . 'db.php';
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];

        $stmt = $conn->prepare('SELECT * FROM usuaris WHERE Usuari = :usuari');
        $stmt->bindParam(':usuari', $usuari);
        $stmt->execute();

        $usuari_db = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $conn->prepare('SELECT Administrador FROM usuaris WHERE Usuari = :usuari');
        $stmt->bindParam(':usuari', $usuari);
        $stmt->execute();

        $isAdmin = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $conn->prepare('SELECT Editor FROM usuaris WHERE Usuari = :usuari');
        $stmt->bindParam(':usuari', $usuari);
        $stmt->execute();

        $isEditor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuari_db && password_verify($contrasenya, $usuari_db['Contrasenya'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $usuari_db['Usuari'];
            if ($isAdmin['Administrador'] == 1) {  // Verificar si el usuari es administrador
                $_SESSION['isAdmin'] = 1;  // Assignar 1 si es administrador
            } else {
                $_SESSION['isAdmin'] = 0;  // Si no es administrador, asignar 0
            }
            if ($isEditor['Editor'] == 1) {  // Verificar si el usuari es editor
                $_SESSION['isEditor'] = 1;  // Assignar 1 si es editor
            } else {
                $_SESSION['isEditor'] = 0;  // Si no es editor, asignar 0
            }
            header('Location: ../index.php');
            exit;
        } else {
            $error = 'Usuari o contrasenya incorrectes.';
            header('Location: ../views/login.php?error=' . urlencode($error));
            exit;
        }
    } else {
        header('Location: login.php');
        exit;
    }
}
?>
