<?php

require_once './app/models/movie-model.php';
require_once './app/views/api-view.php';
require_once './app/helpers/auth-api-helper.php';

class movieApiController
{

    private $model;
    private $view;
    private $authHelper;
    private $data;
    private $order;
    private $columns;
    

    function __construct(){

        $this->model = new movieModel();
        $this->view = new apiView();
        $this->authHelper = new authHelper();
        $this->data = file_get_contents("php://input");

        $this->columns = array("id" , "nombre" , "descripcion" , "estreno" , "id_genero_fk" , "genero");
        $this->order = array("asc" , "desc");
    }

    private function getData()
    {
        return json_decode($this->data);
    }




    function getMovies($params = null){

        $movies = $this->model->getAll();
        
        if ($movies) {

            if (!empty($_GET['sort']) && !empty($_GET['order']) && isset($_GET['offset']) &&  !empty($_GET['limit']) && !empty($_GET['filter'])) {
                                
                $sort = $_GET['sort'];
                $order = $_GET['order'];
                $offset = $_GET['offset'];
                $limit = $_GET['limit'];
                $filter = $_GET['filter'];
                
                if (in_array($sort, $this->columns) && in_array($order, $this->order)) {
                    
                    $movies = $this->model->getAll( $filter , $sort, $order, $offset, $limit);
                    $this->view->response($movies , 200);
                } 
                else {
                    $this->view->response("Columna desconocida u orden distinto de ASC o DESC", 404);
                }
            } 


            else if (!empty($_GET['sort']) && !empty($_GET['order']) && !empty($_GET['filter'])) {
                
                $sort = $_GET['sort'];
                $order = $_GET['order'];
                $filter = $_GET['filter'];

                if (in_array($order, $this->order) && in_array($sort, $this->columns)){

                    $movies = $this->model->getAll($filter , $sort, $order, null, null);
                    
                    $this->view->response($movies, 200);
                
                } 
                else {
                    $this->view->response("Columna desconocida u orden distinto de ASC o DESC", 404);
                }
            }




            else if (!empty($_GET['sort']) && !empty($_GET['order'])  &&  !empty($_GET['limit']) && ($_GET['offset']) != null ) {
                
                $sort = $_GET['sort'];
                $order = $_GET['order'];
                $offset = $_GET['offset'];   
                $limit = $_GET['limit'];


                if (in_array($order, $this->order) && in_array($sort, $this->columns)){

                    $movies = $this->model->getAll(null ,$sort, $order, $offset, $limit);
                    $this->view->response($movies, 200);
                
                } 
                else {
                    $this->view->response("Columna desconocida u orden distinto de ASC o DESC", 404);
              
                }
            }



            else if (!empty($_GET['limit']) && ($_GET['offset']) != null ) {
                

                $offset = $_GET['offset'];   
                $limit = $_GET['limit'];

                $movies = $this->model->getAll(null , null , null , $offset, $limit);

                 if($movies){   

                    $this->view->response($movies, 200);
                
                 }
                 else
                    $this->view->response("No hay peliculas para paginar", 400);
              
                
            }






            
            
            else if (isset($_GET['sort']) && isset($_GET['order'])) {
                
                $sort = $_GET['sort'];
                $order = $_GET['order'];
                

                if (in_array($order , $this->order) && in_array($sort, $this->columns)){
                   
                    $movies = $this->model->getAll(null , $sort, $order , null , null); 
                
                    $this->view->response($movies, 200);
                
                } 
                else {
                    $this->view->response("Columna desconocida u orden distinto de ASC o DESC", 404);
                }
            } 




            else if (isset($_GET['filter'])) {

                $filter = $_GET['filter'];
               
                $movies = $this->model->getAll($filter , null, null, null, null);

                if ($movies){

                    $this->view->response($movies, 200);
                } 
                else {

                    $this->view->response("Ese campo no existe", 404);
                }
            } 




            else {

                $movies = $this->model->getAll();
                $this->view->response($movies, 200);
            }
        } 

        else {
            $this->view->response("No se encontraron peliculas", 404);
        }
    }






    public function getMovie($params = null)
    {

        $id = $params[':ID'];
        $movie = $this->model->get($id);

        if ($movie)
            $this->view->response($movie);
        else
            $this->view->response("El elemento con id $id no existe", 404);
    }





    public function deleteMovie($params = null)
    {

        $id = $params[':ID'];

        $movie = $this->model->get($id);
        if ($movie) {

            if (!$this->authHelper->isLoggedIn()) {

                $this->view->response("No estas logeado", 401);
                return;
            }
            $this->model->delete($id);
            $this->view->response($movie, 200, "Se borro correctamente la pelicula $movie->nombre");
        } else
            $this->view->response("El elemento con id $id no existe", 404);
    }


    public function insertMovie($params = null)
    {

        $body = $this->getData();

        if (empty($body->nombre) || empty($body->descripcion) || empty($body->estreno) || empty($body->id_genero_fk)) {

            $this->view->response("Complete todos los datos", 400);
        } else {

            if (!$this->authHelper->isLoggedIn()) {

                $this->view->response("No estas logeado", 401);
                return;
            }

            $id = $this->model->insert($body->nombre, $body->estreno, $body->descripcion, $body->id_genero_fk);
            $movie = $this->model->get($id);
            $this->view->response($movie, 201, "Se inserto correctamente ");
        }
    }






    
    public function updateMovie($params)
    {

        $id = $params[':ID'];
        $body = $this->getData();


        if (!$this->authHelper->isLoggedIn()) {

            $this->view->response("No estas logeado", 401);
            return;
        }
        if ((empty($body->nombre) || empty($body->descripcion) || empty($body->estreno)) || !$body) {


            $this->view->response("Complete todos los datos o seleccione una pelicula existente", 400);
        } else {

            $this->model->update($id, $body->nombre, $body->descripcion,  $body->estreno);
            $this->view->response($body, 201, "Se modifico correctamente la pelicula $body->nombre");
        }
    }











    
}

