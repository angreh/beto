<?php

class Generic_Admin_Controller extends DefaultController {
    protected function init(){
        $this->sessionVerify();
    }
    
    private function sessionVerify(){
        @ session_start();
        if(!isset($_SESSION['beto_user_id']) || empty($_SESSION['beto_user_id'])){
            $this->redirect('admin/login');
        }
    }
    
}

