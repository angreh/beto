<?php

class Login_Admin_Controller extends DefaultController {
    
    private $mapper;


    protected function init() {
        $this->setLayout('login');
        $this->mapper = new Usuario_Admin_Mapper();
    }
    
    public function indexAction(){
        if(isset($_POST) && !empty($_POST)){
            $_POST['senha'] = base64_encode($_POST['senha']);
            $usuarioId = $this->mapper->checkUser($_POST);
            
            if($usuarioId != false){
                @ session_start();
                $_SESSION['beto_user_id'] = $usuarioId;
                
                $this->redirect('admin');
            }
        } else {
            $this->viewInit();
        }
    }
    
    public function logoutAction(){
        @ session_start();
        unset($_SESSION['beto_user_id']);
        session_destroy();
        
        $this->redirect('admin');
    }
}