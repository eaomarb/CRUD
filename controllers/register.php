<?php
session_start();
$base = '../';  // Ruta base para la inclusión de archivos
require_once $base . 'db.php';  // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];

        // Verificar si el usauri  ja existeix en la base de dades
        $stmt = $conn->prepare('SELECT * FROM usuaris WHERE Usuari = :usuari');
        $stmt->bindParam(':usuari', $usuari);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = 'Lo sentimos, no pudimos completar su registro. El nombre de usuario ya está en uso.';
            echo "<script>alert('" . $error . "');</script>";
            echo "<script>window.location.href='../views/register.php';</script>";
            exit;
        } else {
            // Hash de la contrasenya guarada en la base de dades
            $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

            // Afegeix el nou usuari a la base de dades
            $stmt = $conn->prepare('INSERT INTO usuaris (Usuari, Contrasenya) VALUES (:usuari, :contrasenya)');
            $stmt->bindParam(':usuari', $usuari);
            $stmt->bindParam(':contrasenya', $hashed_password);
            if ($stmt->execute()) {
                header('Location: ../index.php');
                exit;
            } else {
                $error = 'Error al registrar el usuario.';
                header('Location: register_form.php?error=' . urlencode($error));
                exit;
            }
        }
    } else {
        $error = 'Faltan campos.';
        header('Location: register_form.php?error=' . urlencode($error));
        exit;
    }
}
?>
