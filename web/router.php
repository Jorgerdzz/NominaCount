<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];

define('DOMAIN', $protocol . $host);
define('SUBDIRECTORY', '');
define('BASE_PATH', DOMAIN . SUBDIRECTORY);

$routes = require 'routes.php';

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        http_response_code(404);
        $page = '404';
        require 'views/404.php';
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = str_replace(SUBDIRECTORY, '', $uri);

routeToController($uri, $routes);
