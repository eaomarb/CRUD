<?php
session_start(); // Inicia la sesión si aún no se ha iniciado

$base = '../'; // Ruta base para la inclusión de archivos
require_once $base . 'db.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado datos de registro
    if (isset($_POST['usuari']) && isset($_POST['contrasenya'])) {
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];

        // Verifica si el usuario ya existe
        $stmt_check = $GLOBALS['conn']->prepare("SELECT * FROM usuaris WHERE Usuari = :usuari");
        $stmt_check->bindParam(':usuari', $usuari);
        $stmt_check->execute();
        $existing_user = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if (!$existing_user) {
            // Hash de la contraseña
            $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);

            // Inserta el nuevo usuario en la base de datos
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO usuaris (Usuari, Contrasenya) VALUES (:usuari, :contrasenya)");
            $stmt->bindParam(':usuari', $usuari);
            $stmt->bindParam(':contrasenya', $hashed_password);

            if ($stmt->execute()) {
                // Usuario registrado correctamente, muestra un mensaje de alerta
                $msg = "Usuari registrat correctament.";
                header('Location: register.php?msg=' . urlencode($msg));
                exit;
            } else {
                // Si hay un error durante la inserción, muestra el mensaje de error
                $error = "S'ha produït un error en registrar l'usuari.";
                header('Location: register.php?error=' . urlencode($error));
                exit;
            }
        } else {
            // Si el usuario ya existe, muestra un mensaje de error
            $error = "Aquest usuari ja existeix.";
            header('Location: register.php?error=' . urlencode($error));
            exit;
        }
    } else {
        // Si no se han proporcionado datos de registro, redirige al formulario de registro
        header('Location: register.php');
        exit;
    }
}
?>
