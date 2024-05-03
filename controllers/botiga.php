<?php
require_once ('models/botiga.php');

function getProductes()  // Per obtenir els productes
{
	return modQuery();
}

function addProductes($Nom, $Preu, $Stock, $Mides, $Descripció, $Imatge)  // Afegir el Productes
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

function deleteProductes($Id)  // Eliminar els productes
{
	modDelete($Id);
}

/* FUNCIONS PER CARREGAR LES VISTES */

function loadMainView($msg = null)
{
	$result = getProductes();
	$missatge = $msg;
	require_once ('views/main.php');
}

function loadNewProductesView()
{
	require_once ('views/new.php');
}

function loadEditProductesView($Id)
{
	$result = getProducte($Id);
	if ($result) {
		require_once ('views/edit.php');
	} else {
		// Si no troba el producte
		$msg = 'El producte no existeix.';
		loadMainView($msg);
	}
}

function loadShowProductesView($Id)
{
	$result = getProducte($Id);
	if ($result) {
		require_once ('views/show.php');
	} else {
		// Si no troba el producte
		$msg = 'El producte no existeix.';
		loadMainView($msg);
	}
}
?>