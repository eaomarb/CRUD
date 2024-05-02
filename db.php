<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'crud';

try {
    $GLOBALS['conn'] = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // establim el mode d'error PDO a excepció
    $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $GLOBALS['conn'];
} catch (PDOException $e) {
    echo $e;
    return null;
}
