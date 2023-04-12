<?php
$params = explode('/', $_GET['p']);
// var_dump($params);
// echo "<br>";
// !router à revoir avec un Switch Case !

if ($params[0]) {
    $controller = ucfirst($params[0]);
} else {
    $controller = 'Accueil';
}
if (@$params[1]) {
    $method = $params[1];
} else {
    $method = 'index';
}
if (@$params[2]) {
    $req = $params[2];
} else {
    $req = '';
}


$called = 'controllers/' . $controller . '.php';
require($called);

if (method_exists($controller, $method)) {
    $myctrl = new $controller();
    $myctrl->$method($req);
} else {
    echo 'Method ' . $controller . '::' . $method . '() does not exist';
}