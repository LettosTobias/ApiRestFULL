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

    public function insert($nombre, $estreno, $descripcion , $genero){

      $query = $this->db->prepare("INSERT INTO peliculas(nombre , estreno , valoracion , descripcion , id_genero_fk ) VALUES( ? , ? , ? , ? , ?) ");
      $query->execute([$nombre , $estreno  , false , $descripcion , $genero]);

      // $query->execute([$title, $description, $priority, false]);

      return $this->db->lastInsertId();

    
    }

    public function orderDescendiente(){

      $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY id  DESC");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_OBJ);
    }



    public function orderAscendiente(){

      $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY id  ASC");
      $query->execute();

      return $query->fetchAll(PDO::FETCH_OBJ);
    }



    public function update($id , $nombre , $estreno , $descripcion){

      $query = $this->db->prepare("UPDATE peliculas SET nombre = ? , estreno = ? , descripcion = ? WHERE id = $id");
      $query->execute([$nombre , $estreno , $descripcion]);

    }

    

    public function pagination($limit , $offset = null){

      $query = $this->db->prepare("SELECT * FROM peliculas LIMIT 0 , $limit ");
      $query->execute();
      
      
      return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function getByGender($genero){

      $query = $this->db->prepare("SELECT * FROM peliculas WHERE id_genero_fk = ?");
      $query->execute([$genero]);

      return $query->fetchAll(PDO::FETCH_OBJ);

    }


    public function orderAscByItems($item){

      $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $item ASC ");
      $query->execute();

      return $query->fetchAll(PDO::FETCH_OBJ);

    }
    public function orderDescByItems($item){

      $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $item DESC ");
      $query->execute();

      return $query->fetchAll(PDO::FETCH_OBJ);

    }




}