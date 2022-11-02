<?php
require_once './libs/Router.php';
require_once './app/controller/movie-api-controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('movies', 'GET', 'movieApiController', 'getMovies');
$router->addRoute('movie/:ID', 'GET', 'movieApiController', 'getMovie');
$router->addRoute('movies/:GENERO', 'GET', 'movieApiController', 'filter');
$router->addRoute('movie/:ID', 'DELETE', 'movieApiController', 'deleteMovie');
$router->addRoute('movies', 'POST', 'movieApiController', 'insertMovie'); 
$router->addRoute('movies/:ID', 'PUT', 'movieApiController', 'updateMovie'); 
$router->addRoute('pagination/:LIMIT', 'GET', 'movieApiController', 'paginationMovie');
$router->addRoute('movies/:ID/:ORDER', 'GET', 'movieApiController', 'orderByID');
$router->addRoute('order/:FIELD/:ORDER', 'GET', 'movieApiController', 'order');


// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);