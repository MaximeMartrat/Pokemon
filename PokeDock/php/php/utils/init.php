<?php 
// par défault à 0 
ini_set('display_errors', 1);

// renvoi toutes les erreurs
ini_set('error_reporting', E_ALL);

// or error_reporting(E_ALL);


// on définit des constantes pour appeller les scripts quelque soit le dossier de travail

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));