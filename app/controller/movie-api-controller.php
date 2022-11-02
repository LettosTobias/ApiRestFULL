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

    private function getData(){
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

        $body = $this->getData();     
        
        if(empty($body->nombre) || empty($body->descripcion) || empty($body->estreno) || empty($body->id_genero_fk)){
           
            $this->view->response("Complete todos los datos", 400);
        } 
        else {

            $id = $this->model->insert($body->nombre, $body->estreno, $body->descripcion , $body->id_genero_fk); 
            $movie = $this->model->get($id);
            $this->view->response($movie, 201);
        }

    }

    public function paginationMovie($params = null){

        //  $offset = $params['OFFSET'];   
         $limit = $params[':LIMIT'];         
         $movies = $this->model->pagination($limit);

         
         $this->view->response($movies);
            
        //   $this->view->response("No hay peliculas disponibles");   

    }


    public function updateMovie($params){

        $id = $params[':ID'];
        $body = $this->getData();
        $movie = array($id , $body->nombre , $body->estreno , $body->descripcion);
        if((empty($body->nombre) || empty($body->descripcion) || empty($body->estreno)) || !$movie){

            
           $this->view->response("Complete todos los datos o seleccione una pelicula existente" , 400);

        }
        else{

            $this->model->update($id , $body->nombre , $body->descripcion ,  $body->estreno);
            $this->view->response($movie , 201 , "Se modifico correctamente la pelicula $body->nombre"); 
        }

    }


    public function orderAsc(){

       $movies = $this->model->orderAscendiente();
       $this->view->response($movies);
        

    }







    public function orderDesc(){

       $movies = $this->model->orderDescendiente();
       $this->view->response($movies);
        

    }



    public function filter($params){

       $genero = $params[':GENERO'];
       $movies = $this->model->getByGender($genero);
       
       if($movies){

       
        $this->view->response($movies);

       }

       else{
        $this->view->response("Ese genero no existe" , 404);

       }

    }



    public function orderAscByItem($params){

        $item = $params[':CAMPO'];
        
        $movies = $this->model->orderAscByItems($item);
        $this->view->response($movies);

    }



    public function orderDescByItem($params){

        $item = $params[':CAMPO'];
        
        $movies = $this->model->orderDescByItems($item);
        $this->view->response($movies);

    }
}