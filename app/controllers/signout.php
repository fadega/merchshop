<?php

//this controller class calls the view method of the main "Controller" class to see if corresponding view exists 
class Signout extends  Controller{

    //defualt method
    function index(){
        
        
        //no view of a signout page, simply call the logout function
        $user = $this->loadModel('user');
        $user->signout();
      
    }

   
}