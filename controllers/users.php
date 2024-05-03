<?php
require_once ('models/users.php');

function getUsuaris()  // Per obtenir els usuaris
{
    return modQueryUsuaris();
}

function addUsuari($Usuari, $Contrasenya, $Administrador, $Editor)  // Afegir un usuari
{
    return modAddUsuari($Usuari, $Contrasenya, $Administrador, $Editor);
}

function updateUsuari($Id, $Usuari, $Contrasenya, $Administrador, $Editor)  // Actualitzar un usuari
{
    return modUpdateUsuari($Id, $Usuari, $Contrasenya, $Administrador, $Editor);
}

function deleteUsuari($Id)  // Eliminar un usuari
{
    modDeleteUsuari($Id);
}

// Cargar vistas

function loadUsers($msg = null)
{
    $result = getUsuaris();
    $missatge = $msg;
    require_once ('views/mainUser.php');
}

function loadNewUser()
{
    require_once ('views/newUser.php');
}

function loadEditUser($Id)
{
    $result = getUsuaris($Id);
    if ($result) {
        require_once ('views/editUser.php');
    } else {
        // Si no troba el usuari
        $msg = 'El usuari no existeix.';
        loadUsers($msg);
    }
}
?>
