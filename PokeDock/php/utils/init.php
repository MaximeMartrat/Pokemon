<?php 
// par défault à 0 
ini_set('display_errors', 0);

// Redirige les erreurs vers le journal d'erreurs
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log'); // Spécifie le nom du fichier journal

// renvoi toutes les erreurs
ini_set('error_reporting', E_ALL);

// or error_reporting(E_ALL);


// on définit des constantes pour appeller les scripts quelque soit le dossier de travail

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));