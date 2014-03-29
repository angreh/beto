<?php

class Home_Admin_Controller extends Generic_Admin_Controller {
    
    public function homeAction(){
        $this->disableLayout();
        $this->viewInit();
    }
    
}