<?php
// start session
session_start();

// dev mode error handling
error_reporting(E_ALL | E_STRICT);

// set time zone of server
date_default_timezone_set('Asia/Singapore');

// include common utility functions
include 'utils.php';

// manage routing now
$uri = filter_var(rtrim(filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING), '/'), FILTER_SANITIZE_URL);

$router = new Router(explode('/', $uri));
$router->map();

$className = ucWordsByUnderscore($router->getController()) . 'Controller';
$classFile = "app/controllers/$className.php";

$method = $router->getAction();
$id = $router->getId();


if (file_exists($classFile)) {
    $controller = new $className();
    $controller->{$method}($id);
} else {
    echo json_encode(array('message' => '404, not found'));
}


    