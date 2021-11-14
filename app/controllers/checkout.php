<?php


/**
 * Routes the user to checkout page
 */
class Checkout extends  Controller{

    //defualt method
    function index(){
        
        // checkout custom form
        $conn = Database::newInstance();



       $data["Page_title"] = "Checkout";
        
    //    load the home view - > index.php
        $this->view("zac/checkout",$data);

     
    }

   
}