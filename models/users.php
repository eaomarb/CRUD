<?php

// Incloure l'arxiu de la base de dades
require("db.php");

// Funció per establir connexió amb la base de dades
function modConnect() {
    global $conn;
    return $conn;
}

// Funció per obtenir tots els usuaris o un usuari específic per ID
function modQuery($Id = null) {
    modConnect();

    try {
        if ($Id != null) {
            $stmt = $GLOBALS['conn']->prepare("SELECT * FROM usuaris WHERE Id=" . $Id); 
        }
        else {
            $stmt = $GLOBALS['conn']->prepare("SELECT * FROM usuaris ORDER BY Id ASC"); 
        }
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    catch(PDOException $e) {
        return ["Error" => $e->getMessage()];
    }
}

// Funció per afegir un nou usuari
function modAdd($Usuari, $Contrasenya, $Administrador, $Editor) {
    modConnect();
		
    try {
        $sql = "INSERT INTO usuaris (Usuari, Contrasenya, Administrador, Editor) 
                VALUES ('" . $Usuari . "', '" . $Contrasenya . "', '" . $Administrador . "', '" . $Editor . "')";
        if ($GLOBALS['conn']->exec($sql)) {
            return ["Success" => "Usuari afegit correctament"];
        }
        else {
            return ["Error" => "L'usuari no s'ha afegit"];
        }
    }
    catch(PDOException $e) {
        return ["Error" => $e->getMessage()];
    }
}

// Funció per actualitzar un usuari
function modUpdate($Id, $Usuari, $Contrasenya, $Administrador, $Editor) {
    modConnect();
		
    try {
        $sql = "UPDATE usuaris
                SET Usuari='" . $Usuari . "', Contrasenya='" . $Contrasenya . "', Administrador='" . $Administrador . "', Editor='" . $Editor . "'  
                WHERE id='" . $Id . "'";
        if ($GLOBALS['conn']->exec($sql)) {
            return ["Success" => "L'usuari s'ha modificat correctament"];
        }
        else {
            return ["Error" => "L'usuari no s'ha modificat"];
        }
    }
    catch(PDOException $e) {
        return ["Error" => $e->getMessage()];
    }
}

// Funció per eliminar un usuari
function modDelete($Id) {
    modConnect();
		
    try {
        $sql = "DELETE FROM usuaris WHERE Id=".$Id;
        if ($GLOBALS['conn']->exec($sql)){
            return ["Success" => "L'usuari s'ha eliminat correctament"];
        }
        else {
            return ["Error" => "L'usuari no s'ha eliminat"];
        }
    }
    catch(PDOException $e) {
        return ["Error" => $e->getMessage()];
    }
}

?>
