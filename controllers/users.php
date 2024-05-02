<?php
    require("models/users.php");
    
    function getUsuaris() // Per obtenir els usuaris
    {
        return modQuery();
    }
    
    function addUsuari($Usuari, $Contrasenya, $Administrador, $Editor) // Afegir un usuari
    {
        return modAdd($Usuari, $Contrasenya, $Administrador, $Editor);
    }
    
    function updateUsuari($Id, $Usuari, $Contrasenya, $Administrador, $Editor) // Actualitzar un usuari
    {
        return modUpdate($Id, $Usuari, $Contrasenya, $Administrador, $Editor);
    }
    
    
    function deleteUsuari($Id) // Eliminar un usuari
    {
        modDelete($Id);
    }
?>
