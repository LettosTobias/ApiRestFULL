<?php


class userModel{

  private $db;
  
  public function __construct() {

    $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_parte1;charset=utf8', 'root', '');

  }

  public function getUser($email){

    $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $query->execute([$email]);

    return $query->fetch(PDO::FETCH_OBJ);
    
  }


}