<?php

//this controller class calls the view method of the main "Controller" class to see if corresponding view exists 
class Thanks extends  Controller{

    //defualt method
    function index(){
        
        

       $data["Page_title"] = "Thanks";
        
       //load the home view - > index.php
        $this->view("zac/thanks",$data);
      
    }

   
}