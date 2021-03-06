<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * This is the user controller
 */
class Users extends Application {

    function __construct() 
    {
        parent::__construct();
    }

    public function index() 
    {
        if($this->session->userdata('logged_in')){
            $this->getUserInfo($this->session->userdata['username']);
        }else{
            $user = $this->user->getUsers();
            $this->getUserInfo($user[0]['username']);
        }
    }

    
    public function getUserInfo($name) 
    {

        $this->data['userstockholdings'] = $this->User->getUserStockHoldings($name);

        $this->data['pagebody'] = 'user_portfolio'; 
        

        $this->data['userprofile'] = $this->User->getUserTransaction($name);
        
        $this->data['user'] = $name;
        $this->data['title'] = 'User Profile';
        $this->render();
    }

}
