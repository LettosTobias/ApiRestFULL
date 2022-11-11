<?php

    require_once './app/models/movie-model.php';
    require_once './app/views/api-view.php';
    require_once './app/helpers/auth-api-helper.php';
    require_once './app/models/user-model.php';
    require_once './app/secret/auth-secret.php';

    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    
class authApiController{

    private $model;
    private $view;
    private $authHelper;
    private $data;

    public function __construct() {
        
        $this->view = new apiView();
        $this->authHelper = new authHelper();
        $this->model = new userModel();
        
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }



    public function getToken() {
        // Obtener "Basic base64(user:pass)
        $basic = $this->authHelper->getAuthHeader();
        
        if(empty($basic)){
            $this->view->response('No autorizado', 401);
            return;
        }
        
        $basic = explode(" ",$basic); // ["Basic" "base64(user:pass)"]
        if($basic[0]!="Basic"){
            $this->view->response('La autenticación debe ser Basic', 401);
            return;
        }

        //validar usuario:contraseña
        $userpass = base64_decode($basic[1]); // user:pass
        $userpass = explode(":", $userpass);
        $user = $userpass[0];
        $pass = $userpass[1];
        $userdb = $this->model->getUser($user);
        if($userdb->email && password_verify($pass , $userdb->password) ){
            
            $header = array(
                'alg' => 'HS256',
                'typ' => 'JWT'
            );
            $payload = array(
                'id' => 1,
                'name' => "$userdb->name",
                'exp' => time()+3600
            );
            $secret = getSecret();
            $header = base64url_encode(json_encode($header));
            $payload = base64url_encode(json_encode($payload));
            $signature = hash_hmac('SHA256', "$header.$payload", $secret , true);
            $signature = base64url_encode($signature);
            $token = "$header.$payload.$signature";
             $this->view->response($token);
        }else{
            $this->view->response('No autorizado', 401);
        }
    }

   
    



}