<?php
session_start(); // Inicia la sessió si encara no s'ha iniciat

$base = '../'; // Ruta base per a la inclusió d'arxius
require_once $base . 'db.php'; // Inclou l'arxiu de connexió a la base de dades

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si s'han enviat dades d'inici de sessió
    if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];

        // Consulta la base de dades per verificar les credencials
        $stmt = $conn->prepare("SELECT * FROM usuaris WHERE Usuari = :usuari");
        $stmt->bindParam(':usuari', $usuari);
        $stmt->execute();

        $usuari_db = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuari_db && password_verify($contrasenya, $usuari_db['Contrasenya'])) {
            // Les credencials són vàlides, inicia sessió
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $usuari_db['Usuari'];
            // Redirigeix l'usuari a la pàgina principal o a una altra pàgina desitjada
            header('Location: ' . $base . 'index.php');
            exit;
        } else {
            // Les credencials són incorrectes, mostra missatge d'error
            $error = "Usuari o contrasenya incorrectes.";
            header('Location: login.php?error=' . urlencode($error));
            exit;
        }
    } else {
        // Si no s'han proporcionat dades d'inici de sessió, redirigeix al formulari d'inici de sessió
        header('Location: login.php');
        exit;
    }
}
?>
