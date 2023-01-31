<?php
$uri = $_SERVER["REQUEST_URI"];

$routes = [
    "/" => "controllers/index.php"
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}else {
    require "Views/404.php";
}

?>