<?php 

class movieModel{

    private $db;

    public function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_parte1;charset=utf8', 'root', '');

    }




   

    public function getAll($filter = null, $sort = null , $order = null , $offset = null , $limit = null){



        if (isset($sort) &&  isset($order) && isset($offset) && isset($limit) && isset($filter)) {

          $query = $this->db->prepare("SELECT * FROM peliculas WHERE id LIKE ? OR nombre LIKE ? OR descripcion LIKE ? OR estreno LIKE ? OR id_genero_fk LIKE ? ORDER BY $sort  $order LIMIT $offset , $limit ");
          $query->execute([$filter , $filter , $filter , $filter , $filter]);
          return $query->fetchAll(PDO::FETCH_OBJ);
      
        }



        if(!empty($filter) && !empty($sort) && !empty($order)){

          $query = $this->db->prepare("SELECT * FROM peliculas WHERE id LIKE ? OR nombre LIKE ? OR descripcion LIKE ? OR estreno LIKE ? OR id_genero_fk LIKE ?  ORDER BY $sort  $order ");
          $query->execute([$filter , $filter , $filter , $filter , $filter]);
          return $query->fetchAll(PDO::FETCH_OBJ);

        }

        

        if(isset($sort) && isset($order) && isset($offset) && isset($limit)){

          $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $sort $order LIMIT $offset , $limit");
          $query->execute();
          
          return $query->fetchAll(PDO::FETCH_OBJ);


        }




        if(isset($offset) && isset($limit)){

          $query = $this->db->prepare("SELECT * FROM peliculas LIMIT $offset , $limit");
          $query->execute();
          
          return $query->fetchAll(PDO::FETCH_OBJ);


        }








        if(isset($offset) && isset($limit) && isset($filter)){

          $query = $this->db->prepare("SELECT * FROM peliculas WHERE id LIKE ? OR nombre LIKE ? OR descripcion LIKE ? OR estreno LIKE ? OR id_genero_fk LIKE ?  LIMIT $offset , $limit");
          $query->execute([$filter , $filter , $filter , $filter , $filter]);
          
          return $query->fetchAll(PDO::FETCH_OBJ);


        }




        if(isset($offset) && isset($limit) && isset($order)){

          $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $order LIMIT $offset , $limit ");
          $query->execute();
          
          return $query->fetchAll(PDO::FETCH_OBJ);


        }

        
        
        if(!empty($sort) && !empty($order)){

            $query = $this->db->prepare("SELECT * FROM peliculas ORDER BY $sort $order ");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);

        }




        if(isset($filter)){

          $query = $this->db->prepare("SELECT * FROM peliculas WHERE id LIKE ? OR nombre LIKE ? OR descripcion LIKE ? OR estreno LIKE ? OR id_genero_fk LIKE ?  ");
          $query->execute([$filter , $filter , $filter , $filter , $filter]);

          return $query->fetchAll(PDO::FETCH_OBJ);

        }


        
        else {
          $query = $this->db->prepare("SELECT * FROM peliculas");
          $query->execute();
          
          return $query->fetchAll(PDO::FETCH_OBJ);
      
      
        }
    }



    public function get($id){

       $query = $this->db->prepare("SELECT * FROM peliculas WHERE id = ?");
       $query->execute([$id]);

       
       return $query->fetch(PDO::FETCH_OBJ);


    }



    public function delete($id){

      $query = $this->db->prepare("DELETE FROM peliculas WHERE id = ? ");
      $query->execute([$id]);  
 
    }



    public function insert($nombre, $estreno, $descripcion , $genero){

      $query = $this->db->prepare("INSERT INTO peliculas(nombre , estreno , valoracion , descripcion , id_genero_fk ) VALUES( ? , ? , ? , ? , ?) ");
      $query->execute([$nombre , $estreno  , false , $descripcion , $genero]);


      return $this->db->lastInsertId();

    
    }



    public function update($id , $nombre , $estreno , $descripcion){

      $query = $this->db->prepare("UPDATE peliculas SET nombre = ? , estreno = ? , descripcion = ? WHERE id = ?");
      $query->execute([$nombre , $estreno , $descripcion , $id]);

    }



}