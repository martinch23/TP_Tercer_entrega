<?php


require_once('libs/Router.php');
require_once('./app/controllers/APISeriesController.php');

// crea el router
$router = new Router();

// CAMBIAR TABLA DE ROUTEO
$router->addRoute('series', 'GET', 'APISeriesController', 'getAll');
$router->addRoute('series/:ID', 'GET', 'APISeriesController', 'getSerie');
$router->addRoute('series', 'POST', 'APISeriesController', 'create');
$router->addRoute('series/:ID', 'PUT', 'APISeriesController', 'update');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
