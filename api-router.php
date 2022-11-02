<?php
require_once './libs/Router.php';
require_once './app/controller/movie-api-controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('movies', 'GET', 'movieApiController', 'getMovies');
$router->addRoute('movies/ASC', 'GET', 'movieApiController', 'orderAsc');
$router->addRoute('movies/DESC', 'GET', 'movieApiController', 'orderDesc');
$router->addRoute('movie/:ID', 'GET', 'movieApiController', 'getMovie');
$router->addRoute('movies/:GENERO', 'GET', 'movieApiController', 'filter');
$router->addRoute('movies/:ID', 'DELETE', 'movieApiController', 'deleteMovie');
$router->addRoute('movies', 'POST', 'movieApiController', 'insertMovie'); 
$router->addRoute('movies/:ID', 'PUT', 'movieApiController', 'updateMovie'); 
$router->addRoute('pagination/:LIMIT', 'GET', 'movieApiController', 'paginationMovie'); 
$router->addRoute('order/:CAMPO/ASC', 'GET', 'movieApiController', 'orderAscByItem');
$router->addRoute('order/:CAMPO/DESC', 'GET', 'movieApiController', 'orderDescByItem');

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);