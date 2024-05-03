<?php

// Incloure l'arxiu de la base de dades
require_once ('db.php');

// Funció per establir connexió amb la base de dades
function modConnectUsuaris()
{
    global $conn;

    return $conn;
}

// Funció per obtenir tots els usuaris o un usuari específic per ID
function modQueryUsuaris($Id = null)
{
    modConnectUsuaris();

    try {
        if ($Id != null) {
            $stmt = $GLOBALS['conn']->prepare('SELECT * FROM usuaris WHERE Id=' . $Id);
        } else {
            $stmt = $GLOBALS['conn']->prepare('SELECT * FROM usuaris ORDER BY Id ASC');
        }
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        return ['Error' => $e->getMessage()];
    }
}

// Funció per afegir un nou usuari
function modAddUsuari($Usuari, $Contrasenya, $Administrador, $Editor)
{
    modConnectUsuaris();

    try {
        $sql = "INSERT INTO usuaris (Usuari, Contrasenya, Administrador, Editor) 
                VALUES ('" . $Usuari . "', '" . $Contrasenya . "', '" . $Administrador . "', '" . $Editor . "')";
        if ($GLOBALS['conn']->exec($sql)) {
            return ['Success' => 'Usuari afegit correctament'];
        } else {
            return ['Error' => "L'usuari no s'ha afegit"];
        }
    } catch (PDOException $e) {
        return ['Error' => $e->getMessage()];
    }
}

// Funció per actualitzar un usuari
function modUpdateUsuari($Id, $Usuari, $Contrasenya, $Administrador, $Editor)
{
    modConnectUsuaris();

    try {
        $sql = "UPDATE usuaris
                SET Usuari='" . $Usuari . "', Contrasenya='" . $Contrasenya . "', Administrador='" . $Administrador . "', Editor='" . $Editor . "'  
                WHERE Id='" . $Id . "'";
        if ($GLOBALS['conn']->exec($sql)) {
            return ['Success' => "L'usuari s'ha modificat correctament"];
        } else {
            return ['Error' => "L'usuari no s'ha modificat"];
        }
    } catch (PDOException $e) {
        return ['Error' => $e->getMessage()];
    }
}

// Funció per eliminar un usuari
function modDeleteUsuari($Id)
{
    modConnectUsuaris();

    try {
        $sql = 'DELETE FROM usuaris WHERE Id=' . $Id;
        if ($GLOBALS['conn']->exec($sql)) {
            return ['Success' => "L'usuari s'ha eliminat correctament"];
        } else {
            return ['Error' => "L'usuari no s'ha eliminat"];
        }
    } catch (PDOException $e) {
        return ['Error' => $e->getMessage()];
    }
}

?>
