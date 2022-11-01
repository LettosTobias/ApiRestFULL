<?php
require_once './libs/Router.php';
require_once './app/controller/movie-api-controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('movies', 'GET', 'movieApiController', 'getMovies');
$router->addRoute('movies/:ID', 'GET', 'movieApiController', 'getMovie');
$router->addRoute('movies/:ID', 'DELETE', 'movieApiController', 'deleteMovie');
$router->addRoute('movies', 'POST', 'movieApiController', 'insertMovie'); 
$router->addRoute('movies/:ID', 'PUT', 'movieApiController', 'updateMovie'); 
$router->addRoute('pagination/:ID', 'GET', 'movieApiController', 'pagination'); 

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);