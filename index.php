<?php
session_start();

// Verificar si se ha enviado algún formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se está intentando iniciar sesión
    if ($_POST["action"] == "login") {
        // Aquí deberías tener tu lógica de verificación de inicio de sesión
        // Por simplicidad, solo estableceremos la sesión del usuario
        $_SESSION["username"] = $_POST["username"];
        header("Location: dashboard.php"); // Redirige al usuario a la página de dashboard después del inicio de sesión
        exit();
    } 
    // Verificar si se está intentando registrar
    elseif ($_POST["action"] == "register") {
        // Lógica de registro de usuario
        // Después del registro, puedes redirigir al usuario a la página de inicio de sesión o a otra página
        header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión después del registro
        exit();
    }
}

// Cargar controlador de la tienda
require("controllers/botiga.php");

// Manejar las solicitudes GET y POST relacionadas con la tienda
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        if (isset($_GET['id'])) {
            deleteProductes($_GET['id']);
        }
        loadMainView();
    } elseif ($_GET['action'] == 'new') {
        loadNewProductesView();
    } elseif ($_GET['action'] == 'edit') {
        if (isset($_GET['id'])) {
            loadEditProductesView($_GET['id']);
        }
    } elseif ($_GET['action'] == 'show') {
        if (isset($_GET['id'])) {
            loadShowProductesView($_GET['id']);
        }
    } else {
        loadMainView();
    }
} elseif (isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $msg = null;
        if (isset($_POST['Nom']) && isset($_POST['Preu']) && isset($_POST['Stock']) && isset($_POST['Mides']) && isset($_POST['Descripció']) && isset($_POST['Imatge'])) {
            $msg = addProductes($_POST['Nom'], $_POST['Preu'], $_POST['Stock'], $_POST['Mides'], $_POST['Descripció'], $_POST['Imatge']);
        }
        loadMainView($msg);
    } elseif ($_POST['action'] == 'up') {
        if (isset($_POST['Id']) && isset($_POST['Nom']) && isset($_POST['Preu']) && isset($_POST['Stock']) && isset($_POST['Mides']) && isset($_POST['Descripció']) && isset($_POST['Imatge'])) {
            upProductes($_POST['Id'], $_POST['Nom'], $_POST['Preu'], $_POST['Stock'], $_POST['Mides'], $_POST['Descripció'], $_POST['Imatge']);
        }
        loadMainView();
    } else {
        loadMainView();
    }
} else {
    loadMainView();
}
?>
