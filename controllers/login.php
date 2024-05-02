<?php
session_start();
$base = '../';  // Ruta base per a la inclusió d'arxius
require_once $base . 'db.php';  // Inclou l'arxiu de connexió a la base de dades

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
            $_SESSION['isAdmin'] = $isAdmin;
            $_SESSION['isEditor'] = $isEditor;
            header('Location: ../index.php');
            exit;
        } else {
            $error = 'Usuari o contrasenya incorrectes.';
            header('Location: login.php?error=' . urlencode($error));
            exit;
        }
    } else {
        header('Location: login.php');
        exit;
    }
}
?>
