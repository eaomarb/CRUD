<?php
$status = session_status();
if ($status == PHP_SESSION_NONE) {
    // There is no active session
    session_start();
} else if ($status == PHP_SESSION_DISABLED) {
    // Sessions are not available
} else if ($status == PHP_SESSION_ACTIVE) {
    // Destroy current and start new one
    session_destroy();
    session_start();
}

require ('controllers/botiga.php');
require ('controllers/users.php');
$isEditor = 0;
$isAdmin = 0;

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        if (isset($_GET['id'])) {
            if ($_SESSION['isEditor'] == 1) {
                deleteProductes($_GET['id']);
            }
        }
        loadMainView();
    } elseif ($_GET['action'] == 'new') {
        if ($_SESSION['isEditor'] == 1) {
            loadNewProductesView();
        }
    } elseif ($_GET['action'] == 'edit') {
        if (isset($_GET['id'])) {
            if ($_SESSION['isEditor'] == 1) {
                loadEditProductesView($_GET['id']);
            }
        }
    } elseif ($_GET['action'] == 'show') {
        if (isset($_GET['id'])) {
            loadShowProductesView($_GET['id']);
        }
    } elseif ($_GET['action'] == 'showUsuaris' && $_SESSION['isAdmin'] == 1) {
        loadUsers();
    } elseif ($_GET['action'] == 'updateUsuari' && $_SESSION['isAdmin'] == 1) {
        if (isset($_GET['id'])) {
            loadEditUser($_GET['id']);
            echo $_GET['id'];
        }
    } elseif ($_GET['action'] == 'deleteUsuari') {
        if (isset($_GET['id'])) {
            if ($_SESSION['isAdmin'] == 1) {
                deleteUsuari($_GET['id']);
            }
        }
        loadUsers();
    } elseif ($_GET['action'] == 'newUsuari') {
        if ($_SESSION['isAdmin'] == 1) {
            loadNewUser();
        }
    } else {
        loadMainView();
    }
} elseif (isset($_POST['action'])) {
    if ($_POST['action'] == 'add' && $_SESSION['isEditor'] == 1) {
        $msg = null;
        if (isset($_POST['Nom']) && isset($_POST['Preu']) && isset($_POST['Stock']) && isset($_POST['Mides']) && isset($_POST['Descripció']) && isset($_POST['Imatge'])) {
            $msg = addProductes($_POST['Nom'], $_POST['Preu'], $_POST['Stock'], $_POST['Mides'], $_POST['Descripció'], $_POST['Imatge']);
        }
        loadMainView($msg);
    } elseif ($_POST['action'] == 'up' && $_SESSION['isEditor'] == 1) {
        if (isset($_POST['Id']) && isset($_POST['Nom']) && isset($_POST['Preu']) && isset($_POST['Stock']) && isset($_POST['Mides']) && isset($_POST['Descripció']) && isset($_POST['Imatge'])) {
            upProductes($_POST['Id'], $_POST['Nom'], $_POST['Preu'], $_POST['Stock'], $_POST['Mides'], $_POST['Descripció'], $_POST['Imatge']);
        }
        loadMainView();
    } elseif ($_POST['action'] == 'updateUser' && $_SESSION['isAdmin'] == 1) {
        if (isset($_POST['Id']) && isset($_POST['Usuari']) && isset($_POST['Contrasenya']) && isset($_POST['Administrador']) && isset($_POST['Editor'])) {
            $contrasenya = $_POST['Contrasenya'];
            $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);
            updateUsuari($_POST['Id'], $_POST['Usuari'], $hashed_password, $_POST['Administrador'], $_POST['Editor']);
        }

        loadUsers();
    } elseif ($_POST['action'] == 'addUser' && $_SESSION['isAdmin'] == 1) {
        $msg = null;
        if (isset($_POST['Usuari']) && isset($_POST['Contrasenya']) && isset($_POST['Administrador']) && isset($_POST['Editor'])) {
            $contrasenya = $_POST['Contrasenya'];
            $hashed_password = password_hash($contrasenya, PASSWORD_DEFAULT);
            $msg = addUsuari($_POST['Usuari'], $hashed_password, $_POST['Administrador'], $_POST['Editor']);
        }

        loadUsers($msg);
    } else {
        loadMainView();
    }
} else {
    loadMainView();
}

?>