<?php
session_start();
$base = '../'; // Ruta base para la inclusión de archivos
require_once $base . 'db.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];

        // Verificar si el usuario ya existe en la base de datos
        $stmt = $conn->prepare("SELECT * FROM usuaris WHERE Usuari = :usuari");
        $stmt->bindParam(':usuari', $usuari);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "El usuario ya existe.";
            header('Location: register_form.php?error=' . urlencode($error));
            exit;
        } else {
            // Hash de la contraseña antes de guardarla en la base de datos
            $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

            // Insertar el nuevo usuario en la base de datos
            $stmt = $conn->prepare("INSERT INTO usuaris (Usuari, Contrasenya) VALUES (:usuari, :contrasenya)");
            $stmt->bindParam(':usuari', $usuari);
            $stmt->bindParam(':contrasenya', $hashed_password);
            if ($stmt->execute()) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $usuari;
                header('Location: ../index.php');
                exit;
            } else {
                $error = "Error al registrar el usuario.";
                header('Location: register_form.php?error=' . urlencode($error));
                exit;
            }
        }
    } else {
        $error = "Faltan campos.";
        header('Location: register_form.php?error=' . urlencode($error));
        exit;
    }
}
?>
