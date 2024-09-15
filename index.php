<?php
// index.php

// Simple router
$request = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];
$base = dirname($script_name);
$path = str_replace($base, '', $request);
$path = parse_url($path, PHP_URL_PATH);

require_once 'controllers/ContactController.php';

$controller = new ContactController();

switch ($path) {
    case '/':
    case '/index':
        $controller->index();
        break;
    case '/create':
        $controller->create();
        break;
    case '/store':
        $controller->store();
        break;
    case '/edit':
        $controller->edit();
        break;
    case '/update':
        $controller->update();
        break;
    case '/delete':
        $controller->delete();
        break;
    default:
        http_response_code(404);
        echo "Page not found";
        break;
}
