<?php

/**
 * Aquest arxiu espera 3 tipus de peticions:
 * - Peticions sense cap paràmetre: retornarà la vista principal (MainView.php)
 * - Peticions per GET: accions per mostrar les vistes de formulari de nou alumne, editar alumne i esborrar alumne. També la petició d'esborrar un alumne.
 * - Peticions per POST: accions que venen d'un formulari: afegir un nou alumne o modificar un alumne.
 *
 * En funció de la petició, farà unes crIdes o unes altres al controlador (AlumneController.php)
 */
require ('controllers/botiga.php');

if ($_SESSION['isEditor']) {
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
    }
} else {
    loadMainView();
}
?>