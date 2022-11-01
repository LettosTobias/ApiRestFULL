<?php

require_once './app/model/movie-model.php';
require_once './app/view/api-view.php';

class movieApiController{

  private $model;
  private $view;
  private $data;

    function __construct(){

        $this->model = new movieModel();
        $this->view = new apiView();

        $this->data = file_get_contents("php://input"); 
    }

    private function getData() {
        return json_decode($this->data);
    }


    public function getMovies($params = null){

       $movies = $this->model->getAll();
        $this->view->response($movies);

    }


    public function getMovie($params = null){

       $id = $params[':ID'];
       $movie = $this->model->get($id);

       if($movie)
            $this->view->response($movie);
       else
            $this->view->response("El elemento con id $id no existe" , 404 );

    }


    public function deleteMovie($params = null){

        $id = $params[':ID'];
        
        $movie = $this->model->get($id);
        if($movie){
            $this->model->delete($id);
            $this->view->response("Se borro correctamente la pelicula con ID $id" , $movie);
        }
        else
            $this->view->response("El elemento con id $id no existe" , 404 );

    }


    public function insertMovie($params = null){

        $movie = $this->getData();     
        
        if (empty($movie->nombre) || empty($movie->descripcion) || empty($movie->estreno)) {
            $this->view->response("Complete todos los datos", 400);
        } else {
            $id = $this->model->insert($movie->nombre, $movie->estreno, $movie->descripcion);
            $movie = $this->model->get($id);
            $this->view->response("La tarea se inserto con exito", 201);
        }

    }

    public function pagination($params = null){

         $limit = $params[':ID'];         
         $movies = $this->model->pagination($limit);

         if($movies)
            $this->view->response($movies);
         else
          $this->view->response("No hay peliculas disponibles");   

    }




}