<?php
	require("BotigaModel.php");
	
	function getProductes() //Per obtenir els productes
	{
		return modQuery();
	}
	
	function addProductes($Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge) //Afegir el Productes
	{
		return modAdd($Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge);
	}
	
	function upProductes($Id, $Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge)
{
    return modUpdate($Id, $Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge);
}

	
	function getProducte($Id)
	{
		return modQuery($Id);
	}
	
	function deleteProductes($Id) //Eliminar els productes
	{
		modDelete($Id);
	}
	
	
	/**** FUNCIONS PER CARREGAR LES VISTES ***/
	
	function loadMainView($msg=null)
	{
		$result = getProductes();
		$missatge = $msg;
		require_once("MainView.php");
	}
	
	function loadNewProductesView()
	{
		require_once("NewView.php");
	}
	
	function loadEditProductesView($Id)
{
    $result = getProducte($Id);
    if ($result) {
        require_once("EditView.php");
    } else {
        // Si no troba el producte
        $msg = "El producte no existeix.";
        loadMainView($msg);
    }
}

function loadShowProductesView($Id)
{
    $result = getProducte($Id);
    if ($result) {
        require_once("ShowView.php");
    } else {
        // Si no troba el producte
        $msg = "El producte no existeix.";
        loadMainView($msg);
    }
}
?>