<?php 

class movieModel{

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_parte1;charset=utf8', 'root', '');

    }




    public function getAll(){

       $query = $this->db->prepare("SELECT * FROM peliculas");
       $query->execute();
       
       return $query->fetchAll(PDO::FETCH_OBJ);


    }



    public function get($id){

       $query = $this->db->prepare("SELECT * FROM peliculas WHERE id = ?");
       $query->execute([$id]);
       
       return $query->fetch(PDO::FETCH_OBJ);


    }



    public function delete($id){

      $query = $this->db-prepare("DELETE FROM peliculas WHERE id = ? ");
      $query->execute([$id]);  
 
    }

    public function insert($nombre, $estreno, $descripcion){

      $query = $this->db->prepare("INSERT INTO peliculas(nombre , estreno , descripcion , valoracion , imagen) VALUES( ? , ? , ? , ? , ? ) ");
      $query->execute([$nombre , $estreno , $descripcion , false , null]);

      // $query->execute([$title, $description, $priority, false]);

      return $this->db->lastInsertId();

    
    }

    public function pagination($limit){

      $query = $this->db->prepare("SELECT * FROM peliculas LIMIT = $limit ");
      
      $movies = $query->fetchAll(PDO::FETCH_OBJ);
      
      return $movies;
    }





}