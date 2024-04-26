<?php

// Variable global per a la connexió a la base de dades
$conn;

/**
 * Funció per connectar-se a la base de dades.
 * 
 * @return PDO
 */
function modConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "botigaCRUD";

    try {
        $GLOBALS['conn'] = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // establim el mode d'error PDO a excepció
        $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $GLOBALS['conn'];
    } catch(PDOException $e) {
        echo $e;
        return null;
    }
}

/**
 * Funció per obtenir tots els productes.
 * 
 * @return array
 */
function modQuery($Id = null) {
    modConnect();

    try {
        if ($Id != null) {
            $stmt = $GLOBALS['conn']->prepare("SELECT * FROM Productes WHERE Id=" . $Id); 
        }
        else {
            $stmt = $GLOBALS['conn']->prepare("SELECT * FROM Productes ORDER BY Id ASC"); 
        }
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    catch(PDOException $e) {
        return ["Error" => $e->getMessage()];
    }
}

/**
 * Funció per afegir un nou producte.
 * 
 * @param string $Nom
 * @param string $Preu
 * @param string $Stock
 * @param string $Mides
 * @param string $Descripció
 * @param string $Imatge
 * @return array
 */
function modAdd($Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge) {
    modConnect();
		
		try {
			$sql = "INSERT INTO Productes (Nom, Preu, Stock, Mides, Descripció, Imatge) 
            VALUES ('" . $Nom . "', '" . $Preu . "', '" . $Stock . "', '" . $Mides . "', '" . $Descripció . "', '" . $Imatge . "')";
			// use exec() because no results are returned
			if ($GLOBALS['conn']->exec($sql)) {
				return ["Success" => "Producte afegit correctament"];
			}
			else {
				return ["Error" => "L'Producte no s'ha afegit"];
			}
		}
		catch(PDOException $e) {
			return ["Error" => $e->getMessage()];
		}
}

/**
 * Funció per actualitzar un producte.
 * 
 * @param string $Nom
 * @param string $Preu
 * @param string $Stock
 * @param string $Mides
 * @param string $Descripció
 * @param string $Imatge
 * @return array
 */
function modUpdate($Id,$Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge) {
    modConnect();
		
		try {
			$sql = "UPDATE Productes
             SET Nom='" . $Nom . "', Preu='" . $Preu . "', Stock='" . $Stock . "', Mides='" . $Mides . "', Descripció='" . $Descripció . "', Imatge='" . $Imatge . "'  
             WHERE id='" . $Id . "'";
			// use exec() because no results are returned
			if ($GLOBALS['conn']->exec($sql)) {
				return ["Success" => "El producte s'ha modificat correctament"];
			}
			else {
				return ["Error" => "El producte no s'ha modificat"];
			}
		}
		catch(PDOException $e) {
			return ["Error" => $e->getMessage()];
		}
}

/**
 * Funció per eliminar un producte.
 * 
 * @param int $id
 * @return array
 */
function modDelete($Id) {
    modConnect();
		
		try {
			$sql = "DELETE FROM Productes WHERE Id=".$Id;
			// use exec() because no results are returned
			if ($GLOBALS['conn']->exec($sql)){
				return ["Success" => "El producte s'ha eliminat correctament"];
			}
			else {
				return ["Error" => "El producte no s'ha eliminat"];
			}
		}
		catch(PDOException $e) {
			return ["Error" => $e->getMessage()];
		}
}

?>
