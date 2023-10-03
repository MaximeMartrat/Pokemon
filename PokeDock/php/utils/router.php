<?php

$params = explode('/', $_GET['p']);

try {
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

    if (!file_exists($called)) {
        throw new Exception('Controller file not found');
    }

    require($called);

    if (!class_exists($controller) || !method_exists($controller, $method)) {
        throw new Exception('Method ' . $controller . '::' . $method . '() does not exist');
    }

    $myctrl = new $controller();
    $myctrl->$method($req);
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
